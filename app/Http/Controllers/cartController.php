<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;

class cartController extends Controller
{
    //
    public function index($id){
        $categorys = Categories::where('parent_id', 0)->get();
        $products = Products::where('id', $id)->get();
        return view('frontend.HomePage.productsCart', compact('categorys','products'));
    }
}
