<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\checkout;
use App\Models\bill;
use DateTime;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Support\Facades\Auth;
use MongoDB\BSON\Timestamp;
use Illuminate\Support\Carbon;
use phpDocumentor\Reflection\Types\Null_;

use Alert;
use App\Models\product;

Auth::routes();

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cart()
    {
        $key = 30;
        $cart = bill::where('created_at', 'like', '2021-11-%')->get();
        $carts = cart::where('user_id', Auth::user()->id)->get();
        return view('website.cart', ['carts'=>$carts]);
    }

    public function checkout()
    {
        $bill = bill::where('user_id', Auth::user()->id)->where('payment_status', '<' , 2)->get();
        
        $arr = 0;
        if($bill->count() > 0) 
        {
            $id = $bill[0]->id;
            $arr = 1;
        }
        else 
        {
            $id = 0;   
        }

        $checkouts = checkout::where('bill_id', $id)->get();

        return view('website.checkout', ['checkouts'=>$checkouts, 'bill' => $bill, 'arr'=> $arr]);
    }

   public function addToCart($id, $userId)
   {
        cart::create([
            'user_id' => $userId,
            'product_id' => $id,
            'quantity' => 1,
        ]);
        
        return redirect('/cart');
   }

   public function addCartQuantity($id)
   {
        $cart = cart::find($id);
        cart::where('id', $id)->
        update([
            'user_id' => $cart->user_id,
            'product_id' => $cart->product_id,
            'quantity' => $cart->quantity + 1
        ]);

        return redirect()->back();
   }    

   public function deleteCartQuantity($id)
   {
        $cart = cart::find($id);
        cart::where('id', $id)->
        update([
            'user_id' => $cart->user_id,
            'product_id' => $cart->product_id,
            'quantity' => $cart->quantity - 1
        ]);

        $cart = cart::find($id);
        
        if($cart->quantity == 0)
            $cart->delete();

        return redirect()->back();
   }
   
   public function updateCartQuantity(Request $keyword)
   {       
        if($keyword->quantity < 1){
            Alert::warning('Maaf!', 'Harap masukkan kuantitas yang valid!');
            return redirect()->back();
        }

        $cart = cart::find($keyword->id);

        if($keyword->quantity > $cart->product->stock)
        {
            Alert::warning('Maaf!', 'Stock tidak tersedia!');
            return redirect()->back();
        }

        cart::where('id', $keyword->id)->
        update([
            'user_id' => $cart->user_id,
            'product_id' => $cart->product_id,
            'quantity' => $keyword->quantity
        ]);

        Alert::success('Kuantitas berhasil diubah', '');

        return redirect()->back();
   }

   public function deleteCart($id)
   {

       $cart = cart::where('product_id', $id);
       $cart->delete();
       Alert::success("Produk berhasil dibuang", '');
       return redirect()->back();
   }

   
   public function addCheckout(Request $keyword)
   {
        if(!$keyword->shipping_company)
        {
            Alert::warning('Maaf', 'Harap memelih metode pengambilan barang!');
            return redirect()->back();
        }
        elseif(!$keyword->address && $keyword->shipping_company == 'pengantaran')
        {
            Alert::warning('Maaf', 'Harap memasukkan alamat anda!');
            return redirect()->back();
        }
        else{
            $shipping_cost = -1;
            $address = $keyword->address;
            if($keyword->shipping_company == 'ambilSendiri')
            {
                $shipping_cost = 0;
                $address = '-'; 
            }
        }

        $cek_lunas = bill::where('user_id', Auth::user()->id)->where('payment_status', '0')->get();
        $cek_proses = bill::where('user_id', Auth::user()->id)->where('payment_status', '1')->get();

        if( $cek_lunas->isEmpty() && $cek_proses->isEmpty())
        {
            $carts = cart::where('user_id', Auth::user()->id)->get();

            if($carts->isEmpty())
            {
                Alert::warning('Maaf', 'Keranjang anda masih kosong!');
                return redirect()->back();  
            }

            $bill = bill::latest()->get();

            if($bill->isNotEmpty()) $last = $bill[0]->id + 1;
            else $last = 1;


            $total = 0;
            foreach($carts as $cart)
            {
                $_cart = cart::find($cart->id);
                checkout::create([
                    'user_id' => $cart->user_id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'total' => $cart->product->price * $cart->quantity,
                    'bill_id' => $last,
                ]);
                $total += $cart->product->price * $cart->quantity;
                $_cart->delete();
            }

            bill::create([
                'user_id' => Auth::user()->id,
                'total' => $total,
                'payment_status' => 0,
                'product_status' => -1,
                'address' => $address,
                'shipping_cost' => $shipping_cost,
                'shipping_company' => $keyword->shipping_company,
                'customer_note' => '-'
            ]);

            return redirect('/checkout');
        }else 
        {
            Alert::warning('Maaf', 'Harap menyelesaikan transaksi sebelumnya!');
            return redirect()->back();
        }


        
   }
//    public function addCheckout($id)
//    {
        

//         $cek_lunas = bill::where('user_id', Auth::user()->id)->where('payment_status', '0')->get();
//         $cek_proses = bill::where('user_id', Auth::user()->id)->where('payment_status', '1')->get();

//         if( $cek_lunas->isEmpty() && $cek_proses->isEmpty())
//         {
//             $carts = cart::where('user_id', Auth::user()->id)->get();

//             if($carts->isEmpty())
//             {
//                 Alert::warning('Maaf', 'Keranjang anda masih kosong!');
//                 return redirect()->back();  
//             }

//             $bill = bill::latest()->get();

//             if($bill->isNotEmpty()) $last = $bill[0]->id + 1;
//             else $last = 1;


//             $total = 0;
//             foreach($carts as $cart)
//             {
//                 $_cart = cart::find($cart->id);
//                 checkout::create([
//                     'user_id' => $cart->user_id,
//                     'product_id' => $cart->product_id,
//                     'quantity' => $cart->quantity,
//                     'total' => $cart->product->price * $cart->quantity,
//                     'bill_id' => $last,
//                 ]);
//                 $total += $cart->product->price * $cart->quantity;
//                 $_cart->delete();
//             }

//             bill::create([
//                 'user_id' => Auth::user()->id,
//                 'total' => $total,
//                 'payment_status' => '0',
//                 'product_status' => '0',
//                 'address' => '-',
//                 'shipping_cost' => 0,
//                 'shipping_company' => 0,
//                 'customer_note' => '-'
//             ]);

//             return redirect('/checkout');
//         }else 
//         {
//             Alert::warning('Maaf', 'Harap menyelesaikan transaksi sebelumnya!');
//             return redirect()->back();
//         }


        
//    }
   public function productAccepted(Request $keyword)
   {
       //return $keyword;
        $bill = bill::find($keyword->id);
        bill::where('id', $keyword->id)
        ->update([
            'user_id' => Auth::user()->id,
            'total' => $bill->total,
            'payment_status' => $bill->payment_status,
            'product_status' => 2,
            'address' => $bill->address,
            'shipping_cost' => $bill->shipping_cost,
            'shipping_company' => $bill->shipping_company,
            'customer_note' => $bill->customer_note,
        ]);

        Alert::success('Terima kasih telah berbelanja', '');

        return redirect()->back();
   }

   public function addReview(Request $keyword)
   {
    $bill = bill::find($keyword->id);
    bill::where('id', $keyword->id)
    ->update([
        'user_id' => Auth::user()->id,
        'total' => $bill->total,
        'payment_status' => $bill->payment_status,
        'product_status' => $bill->product_status,
        'address' => $bill->address,
        'shipping_cost' => $bill->shipping_cost,
        'shipping_company' => $bill->shipping_company,
        'customer_note' => $bill->customer_note,
    ]);

    Alert::success('Terima kasih!', 'Review anda telah kami simpan');

    return redirect()->back();
   }

   public function addShippingCost(Request $keyword)
   {
    $bill = bill::find($keyword->id);
    bill::where('id', $keyword->id)
    ->update([
        'user_id' => Auth::user()->id,
        'total' => $bill->total,
        'payment_status' => $bill->payment_status,
        'product_status' => $bill->product_status,
        'address' => $bill->address,
        'review' => $bill->review ,
        'shipping_cost' => $keyword->shipping_cost ,
        'shipping_company' => $bill->shipping_company ,
    ]);

    Alert::success('Terima kasih!', 'Biaya ongkir anda telah kami simpan');

    return redirect()->back();
   }

   public function addShippingCompany(Request $keyword)
   {
    $bill = bill::find($keyword->id);
    bill::where('id', $keyword->id)
    ->update([
        'user_id' => Auth::user()->id,
        'total' => $bill->total,
        'payment_status' => $bill->payment_status,
        'product_status' => $bill->product_status,
        'address' => $bill->address,
        'review' => $bill->review ,
        'shipping_cost' => $bill->shipping_cost ,
        'shipping_company' => $keyword->shipping_company ,
    ]);

    Alert::success('Terima kasih!', 'Nama layanan ongkir telah disimpan!');

    return back();
   }

   
}
