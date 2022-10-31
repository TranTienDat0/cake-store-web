<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\userController;
use App\Http\Controllers\productController;

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

//login Admin
Route::get('loginAdmin', [LoginController::class, 'login'])->name('login');
Route::post('loginAdmin', [LoginController::class, 'login_action'])->name('login.action');

//category
Route::get('category', [categoriesController::class, 'index'])->name('category');
Route::get('newCategory', [categoriesController::class, 'create'])->name('newCategory');
Route::post('store',[categoriesController::class, 'store'])->name('store');
Route::get('/edit/{id}', [categoriesController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [categoriesController::class, 'update'])->name('update');
Route::get('/delete/{id}', [categoriesController::class, 'delete'])->name('delete');

//User
Route::get('user', [userController::class, 'index'])->name('user');
Route::get('newUser', [userController::class, 'create_user'])->name('newUser');
Route::post('store_user',[userController::class, 'store_user'])->name('store_user');
Route::get('/edit_user/{user_id}', [userController::class, 'edit_user'])->name('edit_user');
Route::post('/update_user/{user_id}', [userController::class, 'update_user'])->name('update_user');
Route::get('/delete_user/{user_id}', [userController::class, 'delete_user'])->name('delete_user');

//product

Route::get('product', [productController::class, 'index'])->name('product');
Route::get('newProduct', [productController::class, 'create_product'])->name('newProduct');
Route::post('store_product', [productController::class, 'store_product'])->name('store_product');
