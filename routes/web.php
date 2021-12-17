<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use App\Models\bill;
use App\Models\CheckOut;
use App\Models\product;
use App\Models\brand;
use App\Models\Categori;

// use Alert;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $products = product::paginate(6);
    $all = product::all();
    $categories = categori::all();
    $brand = brand::all();
    $kontens = product::where('discount', '>', 0)->get();
    $rekom = product::orderByDesc('sold')->limit(3)->get();
    return view("website.index",['products'=>$products, 'brand'=> $brand,'all'=>$all, 'kontens' => $kontens, 'rekom' => $rekom, 'categories' =>$categories]);
});

Route::get('/000err', function () {
    Alert::error('Harap login terlebih dahulu', '');
    return redirect()->back();
});

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', function()
{
    auth()->logout();
    session()->flush();
    return redirect('/login')->with('status', session('status'));
})->name('logout');

Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware('role:admin');


use App\Http\Controllers\DashboardController;
Route::get('/home', [DashboardController::class, 'index'])->middleware('role:customer');
Route::get('/blogg', [DashboardController::class, 'blog']);
Route::get('/transaction', [DashboardController::class, 'transaction']);
Route::get('/payment/{id}', [DashboardController::class, 'payment']);
Route::post('/addpayment', [DashboardController::class, 'addpayment']);
Route::get('/faq', [DashboardController::class, 'faq']);


use App\Http\Controllers\AdminController;
Route::get('/admin/dashboard', [AdminController::class, 'index']);
Route::get('/admin/profile', [AdminController::class, 'profile']);
Route::get('/admin/product', [AdminController::class, 'showProduct']);
Route::get('/admin/customer', [AdminController::class, 'showCustomer']);
Route::get('/admin/deleteCustomer/{id}', [AdminController::class, 'deleteCustomer']);
Route::get('/admin/restoreCustomer/{id}', [AdminController::class, 'restoreCustomer']);
Route::get('/admin/deleteProduct/{id}', [AdminController::class, 'deleteProduct']);
Route::get('/admin/restoreProduct/{id}', [AdminController::class, 'restoreProduct']);
Route::get('/admin/supplier', [AdminController::class, 'supplier']);
Route::post('/admin/addSupplier', [AdminController::class, 'addSupplier']);
Route::post('/admin/ubahSupplier', [AdminController::class, 'ubahSupplier']);
Route::get('/admin/addproduct', [AdminController::class, 'formAddProduct']);
Route::post('/admin/addproduct', [AdminController::class, 'addProduct']);
Route::post('/admin/addStock', [AdminController::class, 'addStock']);
Route::post('/admin/addShipping', [AdminController::class, 'addShipping']);
Route::get('/admin/transaction', [AdminController::class, 'showTransaksi']);
Route::get('/admin/historyTransaction', [AdminController::class, 'showHistoryTransactions']);
Route::get('/admin/historyTransaction/{id}', [AdminController::class, 'showHistoryTransaction']);
Route::get('/admin/transaction/confirmation/{id}', [AdminController::class, 'confirmationTransaction']);
Route::get('/admin/transaction/reject/{id}', [AdminController::class, 'rejectTransaction']);
Route::get('/admin/send/{id}', [AdminController::class, 'sendProduct']);
Route::get('/admin/confirmPayment/{id}', [AdminController::class, 'confirmPayment']);
Route::get('/admin/clear/{id}', [AdminController::class, 'clear']);
Route::get('/admin/editProfile', [AdminController::class, 'formEditProfile']);
Route::post('/admin/editProfile', [AdminController::class, 'editProfile']);
Route::get('/admin/ubahPassword', [AdminController::class, 'formUbahPassword']);
Route::post('/admin/ubahPassword', [AdminController::class, 'ubahPassword']);
Route::get('/admin/logproduct', [AdminController::class, 'logproduct']);
Route::get('/admin/logaction', [AdminController::class, 'logaction']);
Route::get('/admin/makeadmin/{id}', [AdminController::class, 'makeadmin']);

use App\Http\Controllers\ProductController;
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/categori/{id}', [ProductController::class, 'showCategori']);
Route::get('/product/brand/{id}', [ProductController::class, 'showBrand']);
Route::get('/product/detail/{id}', [ProductController::class, 'detail']);
Route::post('/addBrand', [ProductController::class, 'addBrand']);
Route::post('/addCategori', [ProductController::class, 'addCategori']);


use App\Http\Controllers\TransactionController;
Route::get('/cart', [TransactionController::class, 'cart']);
Route::get('/checkout', [TransactionController::class, 'checkout']);
Route::get('/deleteCart/{id}', [TransactionController::class, 'deleteCart']);
Route::get('/addToCart/{id}/{user_id}', [TransactionController::class, 'addToCart']);
Route::get('/cart/addQuantity/{id}', [TransactionController::class, 'addCartQuantity']);
Route::post('/cart/updateQuantity', [TransactionController::class, 'updateCartQuantity']);
Route::get('/cart/deleteQuantity/{id}', [TransactionController::class, 'deleteCartQuantity']);
Route::post('/checkout', [TransactionController::class, 'addCheckout']);
Route::get('/productAccepted', [TransactionController::class, 'productAccepted']);
Route::post('/addReview', [TransactionController::class, 'addReview']);
Route::post('/addShippingCost', [TransactionController::class, 'addShippingCost']);
Route::post('/addShippingCompany', [TransactionController::class, 'addShippingCompany']);