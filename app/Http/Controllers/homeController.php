<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class homeController extends Controller
{
    //
    public function index()
    {
        $categorys = Categories::where('parent_id', 0)->get();
        $products = Products::Latest()->take(6)->get();
        $productsRecom = Products::Latest('views_count', 'desc')->take(12)->get();
        return view('frontend.homePage.index', compact('categorys','products','productsRecom'));
    }

    public function search(Request $request){
        $key = $request->keyword;
        $categorys = Categories::where('parent_id', 0)->get();
        $search_products = DB::table('products')->where('name', 'like', '%' .$key. '%')->get();
        return view('frontend.homePage.search', compact('categorys', 'search_products'));
    }
}
