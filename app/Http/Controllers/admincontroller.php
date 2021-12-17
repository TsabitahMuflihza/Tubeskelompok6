<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDO;
use App\Models\User;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\bill;
use App\Models\CheckOut;
use App\Models\logproduct;
use App\Models\logaction;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;
use Alert;
use App\Models\PaymentBank;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $product = 5, $np, $na;
    
    public function __construct()
    {
        $this->np = logproduct::orderBy('created_at', 'desc')->get();
        $this->na = logaction::orderBy('created_at', 'desc')->get();
        $this->middleware('auth');
    }

    
    public function index()
    {
        $products = DB::table('products')->get();
        $customers = DB::table('users')->where('role', 'customer')->get();
        $transactions = bill::where('product_status', '<', 2)->get();
        $solds = DB::table('products')->where('sold', '>', 0)->get();
        return view('admin.Dashboard', ['products' => $products, 'customers' => $customers,'transactions' => $transactions, 'solds' => $solds , 'notif_products' => $this->np, 'notif_actions'=> $this->na]);
    }



    public function profile()
    {
        return view("admin.profile", ['notif_products' => $this->np, 'notif_actions'=> $this->na]);
    }

    public function showProduct()
    {
        $products = Product::paginate(4);
        $trash = Product::onlyTrashed()->get();
        return view('admin.product', ['products'=> $products, 'trash' => $trash , 'notif_products' => $this->np, 'notif_actions'=> $this->na]);
    }

    public function supplier()
    {
        $suppliers = DB::table('suppliers')->get();
        $products = DB::table('products')->get();
        return view("admin.supplier", ['suppliers' => $suppliers, 'products'=> $products, 'notif_products' => $this->np, 'notif_actions'=> $this->na]);
    }

    public function addSupplier(Request $keyword)
    {
        Supplier::create([
            'name' => $keyword->name,
            'email' => $keyword->email,
            'phone_number' => $keyword->phone_number,
            'whatsapp' => $keyword->whatsapp,
            'instagram' => $keyword->instagram,
            'facebook' => $keyword->facebook,
            'line' => $keyword->line,
            'telegram' => $keyword->telegram,
            'address' => $keyword->address,
        ]);

        Alert::success('Supplier ditambahkan', '');

        return back();
    }

    public function ubahSupplier(Request $keyword)
    {
        Supplier::find($keyword->id)
        ->update([
            'name' => $keyword->name,
            'email' => $keyword->email,
            'phone_number' => $keyword->phone_number,
            'whatsapp' => $keyword->whatsapp,
            'instagram' => $keyword->instagram,
            'facebook' => $keyword->facebook,
            'line' => $keyword->line,
            'telegram' => $keyword->telegram,
            'address' => $keyword->address,
        ]);

        Alert::success('Data supplier berhasil diubah', '');

        return back();
    }

    public function showCustomer()
    {
        $users = user::where('role', 'customer')->paginate(5);
        return view("admin.customer", [ 'users' => $users, 'notif_products' => $this->np, 'notif_actions'=> $this->na]);
    }

    public function deleteCustomer($id)
    {
        // $customer = user::find($id);
        // $customer->delete();

        user::find($id)
        ->update([
            'active' => 0
        ]);

        return redirect('/admin/customer');
    }
    
    public function restoreCustomer($id)
    {
        // $customer = user::onlyTrashed()->where('id', $id);
        // $customer->restore();

        user::find($id)
        ->update([
            'active' => 1
        ]);

        return redirect('/admin/customer');
    }
    
    public function deleteProduct($id)
    {
        $product = product::find($id);
        $name_product = $product->name;
        // $product->delete();
        $name = Auth::user()->username;

        product::find($id)
        ->update([
            'active' => 0
        ]);

        logproduct::create([
            'action' => 4,
            'user_id' => Auth::user()->id,
            'product_id' => $id,
            'quantity' => 0,
            'keterangan' => "{$name} menonaktifkan {$name_product}."
        ]);

        return redirect('/admin/product');
    }
    
    public function restoreProduct($id)
    {
        // $product = product::onlyTrashed()->where('id', $id);
        // $product->restore();
        product::find($id)
        ->update([
            'active' => 1
        ]);

        $product_name = product::find($id)->name;
        $name = Auth::user()->username;

        logproduct::create([
            'action' => 5,
            'user_id' => Auth::user()->id,
            'product_id' => $id,
            'quantity' => 0, 
            'keterangan' => "{$name} telah mengaktifkan {$product_name}."
        ]);

        return redirect('/admin/product');
    }

    public function formAddProduct()
    {
        $categories = DB::table('categoris')->get();
        $brands = DB::table('brands')->get();
        $suppliers = DB::table('suppliers')->get();
        return view("admin.addProduct", ['brands' => $brands, 'categories' => $categories, 'suppliers' => $suppliers, 'notif_products' => $this->np, 'notif_actions'=> $this->na]);
    }

    public function addProduct(Request $keyword)
    {
        $keyword->validate([
            'name' => ['required', 'string', 'unique:products,name'],
            'categori_id' => ['required'],
            'brand_id' => ['required'],
            'stock' => ['required'],
            'price' => ['required'],
            'supplier_id' => ['required'],
            'info' => ['required'],
            'image' => ['required'],
        ]);


            $supplier = DB::table('suppliers')->find($keyword->supplier_id);
            Product::create([
                'name' => $keyword->name,
                'categori_id' => $keyword->categori_id,
                'brand_id' => $keyword->brand_id,
                'stock' => $keyword->stock,
                'price' => $keyword->price,
                'supplier_id' => $supplier->id,
                'info' => $keyword->info,
                'image' => $keyword->image,
                'active' => 1,
                'discount' => 0,
                'sold' => 0
            ]);

            Alert::success('Produk berhasil ditambahkan', '');

            $products = product::all();
            $product = $products[$products->count()-1];
            $name = Auth::user()->username;

            logproduct::create([
                'action' => 1,
                'user_id' => Auth::user()->id,
                'product_id' => $product->id,
                'quantity' => $keyword->stock,
                'keterangan' => "{$name} menambahkan produk baru .{$keyword->name}: {$keyword->stock}"
            ]);

        return back();
    }

    public function addStock(Request $keyword)
    {
        if(!$keyword->stock | $keyword->stock < 1 | !is_numeric($keyword->stock))
        {
            Alert::error("Harap masukkan stock yang valid", '');
            return back();
        }
        $keyword->validate([
            'stock' => ['integer'],
        ]);


        $product = product::find($keyword->id);
        product::where('id', $keyword->id)
        ->update([
            'stock' => $product->stock + $keyword->stock,
        ]);

        $name = Auth::user()->username;
        logproduct::create([
            'action' => 2,
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
            'quantity' => $keyword->stock,
            'keterangan' => "{$name} menambahkan {$keyword->stock} unit {$product->name}."
        ]);

        Alert::success("Berhasil menambahkan {$keyword->stock} {$product->name}.", '');

        return redirect('/admin/product');//->with('status', "Anda telah berhasil menambahkan {$keyword->stock} {$product->name}.");
    }

    public function showTransaksi()
    {
        $checkouts = checkout::all();
        $bills = bill::where('product_status', '<', 2)->get();
        $banks = PaymentBank::all();
        return view("admin.transaksi", ['checkouts' => $checkouts, 'bills' => $bills, 'notif_products' => $this->np, 'notif_actions'=> $this->na, 'banks' => $banks]);
    }

    public function showHistoryTransactions()
    {
        $checkouts = checkout::all();
        $bills = bill::where('product_status', '>', 1)->get();
        return view("admin.historyTransaction", ['checkouts' => $checkouts, 'bills' => $bills, 'notif_products' => $this->np, 'notif_actions'=> $this->na]);
    }

    public function showHistoryTransaction($id)
    {
        $checkouts = checkout::all();
        $bills = bill::where('product_status', '>', 1)->where('user_id', $id)->get();
        return view("admin.historyTransaction", ['checkouts' => $checkouts, 'bills' => $bills, 'notif_products' => $this->np, 'notif_actions'=> $this->na]);
    }

    public function confirmationTransaction($id)
    {
        $checkouts = checkout::where('bill_id', $id)->get();

        foreach($checkouts as $bill)
        {
            $product = product::find($bill->product_id);
            //return $product;

            if($bill->quantity > $product->stock)
            {
                Alert::error("Maaf kuantitas {$product->name} tidak cukup!", '');
                return redirect()->back();
            }

            product::find($bill->product_id)
            ->update([
                'name' => $product->name,
                'categori_id' => $product->categori_id,
                'brand_id' => $product->brand_id,
                'stock' => $product->stock - $bill->quantity,
                'price' => $product->price,
                'supplier_id' => $product->supplier_id,
                'info' => $product->info,
                'image' => $product->image,
                'discount' => $product->discount,
                'sold' => $product->sold + $bill->quantity,
            ]);
        }

        $bill = bill::find($id);
        bill::where('id', $id)
        ->update([
            'user_id' => $bill->user_id,
            'total' => $bill->total,
            'payment_status' => 1,
            'product_status' => -1,
            'address' => $bill->address,
            'shipping_cost' => $bill->shipping_cost,
            'shipping_company' => $bill->shipping_company,
            'customer_note' => $bill->customer_note,
        ]);
        $name = Auth::user()->username;
        logaction::create([
            'action' => 'Konfirmasi Pembelian',
            'user_id' => Auth::user()->id,
            'bill_id' => $id,
            'keterangan' => "{$name} telah menolak pembelian {$bill->user->name}"
        ]);

        Alert::success('Transaksi berhasil dikonfimasi', '');

        return redirect()->back();
    }

    public function rejectTransaction($id)
    {
        $bill = bill::find($id);
        bill::where('id', $id)
        ->update([
            'user_id' => $bill->user_id,
            'total' => $bill->total,
            'payment_status' => 3,
            'product_status' => 3,
            'address' => $bill->address,
            'shipping_cost' => $bill->shipping_cost,
            'shipping_company' => $bill->shipping_company,
            'customer_note' => $bill->customer_note,
        ]);
        $name = Auth::user()->username;
        logaction::create([
            'action' => 5,
            'user_id' => Auth::user()->id,
            'bill_id' => $id,
            'keterangan' => "{$name} telah menolak pembelian {$bill->user->name}"
        ]);

        Alert::success('Transaksi telah ditolak', '');

        return redirect()->back();
    }

    public function sendProduct($id)
    {
        $bill = bill::find($id); 
        bill::find($id)
        ->update([
            'user_id' => $bill->user_id,
            'total' => $bill->total,
            'payment_status' => $bill->payment_status,
            'product_status' => 1,
            'address' => $bill->address,
            'shipping_cost' => $bill->shipping_cost,
            'shipping_company' => $bill->shipping_company,
            'customer_note' => $bill->customer_note,
        ]);
        $name = Auth::user()->username;
        logaction::create([
            'action' => 3,
            'user_id' => Auth::user()->id,
            'bill_id' => $id,
            'keterangan' => "{$name} telah mengirim product atas nama pembelian {bill->user->name}"
        ]);

        Alert::success('Produk berhasil dikirimkan!', '');

        return redirect()->back();
    }

    public function confirmPayment($id)
    {
        $bill = bill::find($id); 
        bill::find($id)
        ->update([
            'user_id' => $bill->user_id,
            'total' => $bill->total,
            'payment_status' => $bill->payment_status,
            'product_status' => 0,
            'address' => $bill->address,
            'shipping_cost' => $bill->shipping_cost,
            'shipping_company' => $bill->shipping_company,
            'customer_note' => $bill->customer_note,
        ]);
        $name = Auth::user()->username;
        logaction::create([
            'action' => 2,
            'user_id' => Auth::user()->id,
            'bill_id' => $id,
            'keterangan' => "{$name} mengkonfirmasi pembayaran {$bill->user->name}"
        ]);

        Alert::success('Pembayaran berhasil dikonfirmasi!', '');

        return redirect()->back();
    }

    public function clear($id)
    {
        $bill = bill::find($id); 
        bill::find($id)
        ->update([
            'user_id' => $bill->user_id,
            'total' => $bill->total,
            'payment_status' => $bill->payment_status,
            'product_status' => 2,
            'address' => $bill->address,
            'shipping_cost' => $bill->shipping_cost,
            'shipping_company' => $bill->shipping_company,
            'customer_note' => $bill->customer_note,
        ]);
        $name = Auth::user()->username;
        logaction::create([
            'action' => 4,
            'user_id' => Auth::user()->id,
            'bill_id' => $id,
            'keterangan' => "{$name} telah menyelesaikan pesanan {$bill->user->name}"
        ]);

        return redirect()->back();
    }

    public function addShipping(Request $keyword)
    {

        $bill = bill::find($keyword->id); 
        bill::find($keyword->id)
        ->update([
            'user_id' => $bill->user_id,
            'total' => $bill->total,
            'payment_status' => 1,
            'product_status' => -1,
            'address' => $bill->address,
            'shipping_cost' => $keyword->shipping_cost,
            'shipping_company' => $keyword->shipping_company,
            'customer_note' => $bill->customer_note,
        ]);

        $checkouts = checkout::where('bill_id', $keyword->id)->get();

        foreach($checkouts as $bill)
        {
            $product = product::find($bill->product_id);
            //return $product;

            if($bill->quantity > $product->stock)
            {
                Alert::error("Maaf kuantitas {$product->name} tidak cukup!", '');
                return redirect()->back();
            }

            product::find($bill->product_id)
            ->update([
                'name' => $product->name,
                'categori_id' => $product->categori_id,
                'brand_id' => $product->brand_id,
                'stock' => $product->stock - $bill->quantity,
                'price' => $product->price,
                'supplier_id' => $product->supplier_id,
                'info' => $product->info,
                'image' => $product->image,
                'discount' => $product->discount,
                'sold' => $product->sold + $bill->quantity,
            ]);
        }
        $name = Auth::user()->username;
        logaction::create([
            'action' => 1,
            'user_id' => Auth::user()->id,
            'bill_id' => $keyword->id,
            'keterangan' => "{$name} telah mengonfirmasi pembelian {$bill->user->name}"
        ]);

        Alert::success('Ongkir telah ditambahkan!', 'Transaksi telah diterima');

        return redirect()->back();
    }

    public function formEditProfile()
    {
        $user = user::find(Auth::user()->id);
        return view('admin.editProfile', ['user'=>$user, 'notif_products' => $this->np, 'notif_actions'=> $this->na]);
    }

    public function editProfile(Request $keyword)
    {
        User::find(Auth::user()->id)
        ->update([
            'username' => $keyword->username,
            'email' => $keyword->email,
            'password' => Hash::make($keyword->password),
            'name' => $keyword->name,
            'address' => $keyword->address,
            'role' => Auth::user()->role,   
            'phone_number' => $keyword->phone_number,
        ]);

        Alert::success('Profil berhasil diubah!');

        return redirect()->back();
    }

    public function formUbahPassword()
    {
      return view('admin.ubahPassword', ['notif_products' => $this->np, 'notif_actions'=> $this->na]);
    }

    public function ubahPassword(Request $keyword)
    {   
        $keyword->validate([
            'password' => 'required|string|min:8|max:25|confirmed'
        ]);

        User::find(Auth::user()->id)
        ->update([
            'username' => Auth::user()->username,
            'email' => Auth::user()->email,
            'password' => Hash::make($keyword->password),
            'name' => Auth::user()->name,
            'address' => Auth::user()->address,
            'role' => Auth::user()->role,   
            'phone_number' => Auth::user()->phone_number,
        ]);

        Alert::success('Password berhasil diubah!');
    
        return redirect('/admin/editProfile');
    }

    public function logproduct()
    {
        return view('admin.logproduct', ['notif_products' => $this->np, 'notif_actions'=> $this->na]);
    }

    public function logaction()
    {
        return view('admin.logaction', ['notif_products' => $this->np, 'notif_actions'=> $this->na]);
    }

    public function makeadmin($id)
    {
        user::find($id)
        ->update([
            'role' => 'admin'
        ]);

        Alert::success('Berhasil diubah menjadi admin!');

        return back();
    }
}
