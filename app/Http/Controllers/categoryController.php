<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;

class categoryController extends Controller
{
    //
    public function index($id){
        $categorys = Categories::where('parent_id', 0)->get();
        $products = Products::where('category_id', $id)->paginate(6);
        
        return view('frontend.HomePage.ListProducts', compact('categorys','products'));
    }
}
