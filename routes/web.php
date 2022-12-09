<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\categoriesControllerAdmin;
use App\Http\Controllers\userControllerAdmin;
use App\Http\Controllers\productControllerAdmin;
use App\Http\Controllers\homeController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productDetailController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\checkoutController;
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
    return view("home");
});
//register
Route::get('register', [AdminController::class, 'register'])->name('register');
Route::post('register', [AdminController::class, 'register_action'])->name('register.action');

//login/
Route::get('admin', [AdminController::class, 'index'])->name('admin');
Route::get('loginAdmin', [AdminController::class, 'login'])->name('loginAdmin');
Route::post('loginAdmin', [AdminController::class, 'login_action'])->name('login.action');
Route::get('logoutAdmin', [AdminController::class, 'login'])->name('logout');

//category
Route::get('category', [categoriesControllerAdmin::class, 'index'])->name('category');
Route::get('newCategory', [categoriesControllerAdmin::class, 'create'])->name('newCategory');
Route::post('store',[categoriesControllerAdmin::class, 'store'])->name('store');
Route::get('/edit/{id}', [categoriesControllerAdmin::class, 'edit'])->name('edit');
Route::post('/update/{id}', [categoriesControllerAdmin::class, 'update'])->name('update');
Route::get('/delete/{id}', [categoriesControllerAdmin::class, 'delete'])->name('delete');

//User
Route::get('user', [userControllerAdmin::class, 'index'])->name('user');
Route::get('newUser', [userControllerAdmin::class, 'create_user'])->name('newUser');
Route::post('store_user',[userControllerAdmin::class, 'store'])->name('store_user');
Route::get('/edit_user/{user_id}', [userControllerAdmin::class, 'edit'])->name('edit_user');
Route::post('/update_user/{user_id}', [userControllerAdmin::class, 'update'])->name('update_user');
Route::get('/delete_user/{user_id}', [userControllerAdmin::class, 'delete'])->name('delete_user');

//product

Route::get('product', [productControllerAdmin::class, 'index'])->name('product');
Route::get('newProduct', [productControllerAdmin::class, 'create'])->name('newProduct');
Route::post('store_product', [productControllerAdmin::class, 'store'])->name('store_product');
Route::get('/edit_product/{id}', [productControllerAdmin::class, 'edit'])->name('edit_product');
Route::post('/update_product/{id}', [productControllerAdmin::class, 'update'])->name('update_product');
Route::get('/delete_product/{id}', [productControllerAdmin::class, 'delete'])->name('delete_product');


//HomePage
Route::get('home',[homeController::class, 'index'])->name('home');
Route::post('search',[homeController::class, 'search'])->name('search');
//category
Route::get('/listCategory/{id}', [categoryController::class, 'index'])->name('listCategory');
//Detail
Route::get('/productDetail/{id}',[productDetailController::class, 'index'])->name('productDetail');
//cart
Route::post('/cart', [cartController::class, 'save'])->name('cart');
Route::get('/show-cart', [cartController::class, 'showCart'])->name('show-cart');
Route::get('/delete_cart/{rowId}', [cartController::class, 'delete'])->name('delete_cart');
Route::post('/update_cart', [cartController::class, 'update'])->name('update_cart');
//check-out
Route::post('/login-customer',[checkoutController::class, 'login_customer'])->name('login-customer');
Route::get('/login-check', [checkoutController::class, 'login_checkout'])->name('login-check');
Route::get('/logout-check', [checkoutController::class, 'logout_checkout'])->name('logout-check');
Route::post('/add-customer',[checkoutController::class, 'add_customer'])->name('add-customer');
Route::get('/checkout', [checkoutController::class, 'checkout'])->name('checkout');
Route::post('/save-checkout-customer',[checkoutController::class, 'save_checkout_customer'])->name('save-checkout-customer');
Route::get('/payment', [checkoutController::class, 'payment'])->name('payment');
//order
Route::post('/order-place',[checkoutController::class, 'order_place'])->name('order-place');
Route::get('/manage-order',[checkoutController::class, 'manage_order'])->name('manage-order');
Route::get('/view-order/{orderID}',[checkoutController::class, 'view_order'])->name('view-order');
