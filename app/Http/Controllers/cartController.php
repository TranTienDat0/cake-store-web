<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;;
use Session;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;

session_start();

class cartController extends Controller
{
    //
    public function save(Request $request){
       
        
        $productID = $request->productid_hidden;
        $quantity = $request->qty;

        $products_info = DB::table('products')->where('id', $productID)->first();

        $data['id'] = $products_info->id;
        $data['qty'] = $quantity;
        $data['name'] = $products_info->name;
        $data['price'] = $products_info->price;
        $data['weight'] = 0;
        $data['options']['image'] = $products_info->image;
        Cart::add($data);
        Cart::setGlobalTax(0);

        return Redirect::to('show-cart');
    }
    public function showCart(){
        $categorys = Categories::where('parent_id', 0)->get();

        return view('frontend.HomePage.cart', compact('categorys'));
    }
        
    public function delete($rowId){
        Cart::update($rowId,0);
        return Redirect::to('show-cart');
    }
    public function update(Request $request){
        $rowId = $request->rowId_pro;
        $qty = $request->quantity;
        Cart::update($rowId,$qty);

        return Redirect::to('show-cart');
    }
}
