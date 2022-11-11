<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\categoriesControllerAdmin;
use App\Http\Controllers\userControllerAdmin;
use App\Http\Controllers\productControllerAdmin;
use App\Http\Controllers\homeController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productDetailController;
use App\Http\Controllers\cartController;

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
//homeAdmin
Route::get('/homeAdmin', function () {
    return view('admin.home');
})->name('homeAdmin');

//register
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('register', [LoginController::class, 'register_action'])->name('register.action');

//login/logout Admin
Route::get('loginAdmin', [LoginController::class, 'login'])->name('login');
Route::post('loginAdmin', [LoginController::class, 'login_action'])->name('login.action');
Route::get('logoutAdmin', [LoginController::class, 'login'])->name('logout');

//category
Route::get('category', [categoriesControllerAdmin::class, 'index'])->name('category');
Route::get('newCategory', [categoriesControllerAdmin::class, 'create'])->name('newCategory');
Route::post('store',[categoriesControllerAdmin::class, 'store'])->name('store');
Route::get('/edit/{id}', [categoriesControllerAdmin::class, 'edit'])->name('edit');
Route::post('/update/{id}', [categoriesControllerAdmin::class, 'update'])->name('update');
Route::get('/delete/{id}', [categoriesControllerAdmin::class, 'delete'])->name('delete');

//User
Route::get('user', [userControllerAdmin::class, 'index'])->name('user');
Route::get('newUser', [userControllerAdmin::class, 'create'])->name('newUser');
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
//category
Route::get('/listCategory/{id}', [categoryController::class, 'index'])->name('listCategory');
//Detail
Route::get('/productDetail/{id}',[productDetailController::class, 'index'])->name('productDetail');
//cart
Route::post('/cart', [cartController::class, 'save'])->name('cart');
Route::get('/show-cart', [cartController::class, 'showCart'])->name('show-cart');
Route::get('/delete_cart/{rowId}', [cartController::class, 'delete'])->name('delete_cart');
