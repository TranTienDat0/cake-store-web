<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
class productDetailController extends Controller
{
    //
    public function index($id){
        $categorys = Categories::where('parent_id', 0)->get();
        $products = Products::where('id', $id)->get();
        $productsRecom = Products::Latest('views_count', 'desc')->take(12)->get();
        return view('frontend.HomePage.productsDetail', compact('categorys','products','productsRecom'));
    }
}
