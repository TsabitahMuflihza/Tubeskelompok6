<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\bill;
use App\Models\CheckOut;
use App\Models\product;
use App\Models\PaymentBank;
use App\Models\brand;
use App\Models\Categori;
use Symfony\Component\HttpKernel\Event\RequestEvent;

use Alert;
Auth::routes();

class DashboardController extends Controller 
{
  protected $hal = 6;

  public function __construct() {
    $this->middleware('auth');
  }

  public function index() 
    {
        $carts = DB::table('carts')->where('user_id', Auth::user()->id)->select('product_id')->get();
        $products = product::paginate($this->hal);
        $all = product::all();
        $categories = categori::all();
        $brand = brand::all();
        $kontens = product::where('discount', '>', 0)->get();
        $rekom = product::orderByDesc('sold')->limit(3)->get();
        //return ($cart);//->search(10);
        return view("website.home",['products'=>$products, 'brand'=> $brand, 'all'=>$all, 'kontens' => $kontens, 'rekom' => $rekom, 'categories' => $categories, 'carts' => $carts]);
    }

    public function blog()
    {
        $all = DB::table('products')->get();
        $categories = DB::table('categoris')->get();
        $brand = DB::table('brands')->get();
        return view("website.blog",['brand'=> $brand, 'all'=>$all, 'categories' => $categories]);
    }

    public function transaction()
    {
      $carts = DB::table('carts')->where('user_id', Auth::user()->id)->select('product_id')->get();
      $products = DB::table('products')->paginate($this->hal);
      $all = DB::table('products')->get();
      $categories = DB::table('categoris')->get();
      $brand = DB::table('brands')->get();
      $kontens = DB::table('products')->where('discount', '>', 0)->get();
      $rekom = DB::table('products')->orderByDesc('sold')->limit(3)->get();
      $bills = bill::where('user_id', Auth::user()->id)->orderBy('payment_status', 'asc')->get();
      $checkouts = checkout::where('user_id', Auth::user()->id)->get();
      return view('website.transaction', ['products'=>$products, 'brand'=> $brand, 'all'=>$all, 'kontens' => $kontens, 'rekom' => $rekom, 'categories' => $categories, 'carts' => $carts, 'checkouts' => $checkouts, 'bills' => $bills]);
    }

    public function payment($id)
    {
      return view('website.pembayaran', ['id'=>$id]);
    }

    public function addpayment(Request $key)
    {
      paymentbank::create([
        'bill_id' => $key->bill_id,
        'name' => $key->name,
        'no_rek' => $key->no_rek,
      ]);

      bill::find($key->bill_id)
      ->update([
        'payment_status' => 2,
      ]);

      Alert::success('Data berhasil ditambahkan', '');

      return redirect('/transaction');
    }

    public function faq()
    {
      return view('website.faq');
    }

    
}