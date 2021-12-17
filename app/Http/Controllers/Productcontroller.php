<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\brand;
use App\Models\categori;
use Illuminate\Support\Facades\Auth;

Auth::routes();
use Alert;

class Productcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $hal = 6;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $carts = DB::table('carts')->where('user_id', Auth::user()->id)->select('product_id')->get();
        $products = DB::table('products')->paginate($this->hal);
        $all = DB::table('products')->get();
        $categories = DB::table('categoris')->get();
        $brand = DB::table('brands')->get();
        return view("website.product",['products'=>$products, 'brand'=> $brand, 'all'=>$all, 'categories' => $categories, 'carts' => $carts]);
    }

    
    public function store(Request $request)
    {
        //
    }
    
    public function detail($id)
    {
        $carts = DB::table('carts')->where('user_id', Auth::user()->id)->select('product_id')->get();
        $product = DB::table('products')->find($id);
        $all = DB::table('products')->get();
        $categories = categori::all();
        $brand = brand::all();
        $rekom = DB::table('products')->orderByDesc('sold')->limit(3)->get();
        return view("website.detail_product",['product'=>$product, 'brand'=> $brand, 'all'=>$all, 'rekom' => $rekom, 'categories' => $categories, 'carts' => $carts]);
    }

    public function showBrand($id)
    {
        $carts = DB::table('carts')->where('user_id', Auth::user()->id)->select('product_id')->get();
        $products = DB::table('products')->where('brand_id', $id)->paginate($this->hal);
        $all = DB::table('products')->get();
        $categories = DB::table('categoris')->get();
        $brand = DB::table('brands')->get();
        return view("website.product",['products'=>$products, 'brand'=> $brand, 'all'=>$all, 'categories' => $categories, 'carts' => $carts]);
    }

    public function showCategori($id)
    {
        $carts = DB::table('carts')->where('user_id', Auth::user()->id)->select('product_id')->get();
        $products = DB::table('products')->where('categori_id', $id)->paginate($this->hal);
        $all = DB::table('products')->get();
        $categories = DB::table('categoris')->get();
        $brand = DB::table('brands')->get();
        return view("website.product",['products'=>$products, 'brand'=> $brand, 'all'=>$all, 'categories' => $categories, 'carts' => $carts]);
    }

    public function show()
    {
        $carts = DB::table('carts')->where('user_id', Auth::user()->id)->select('product_id')->get();
        $product = DB::table('products')->get();
        return view('admin.product', ['carts' => $carts]);
    }

    public function addBrand(Request $keyword)
    {
        $keyword->validate([
            'name' => ['required'],
        ]);

        brand::create([
            'name' => $keyword->name
        ]);

        Alert::success('Brand berhasil ditambahkan', '');

        return back();
    }

    public function addCategori(Request $keyword)
    {
        $keyword->validate([
            'name' => ['required'],
        ]);

        categori::create([
            'name' => $keyword->name
        ]);

        Alert::success('Kategori berhasil ditambahkan', '');

        return back();
    }
}
