<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;

class productController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index(){

        return view('admin.products.index');
    }
    public function create_product(){
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.products.addProduct', compact('htmlOption'));
    }
    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    public function store_product(Request $request){ 
       
        $filename = $request->feature_image_path->getClientOriginalName();
        $path = $request->file('feature_image_path')->storeAs('public/uploads',$filename);
 
    }
}
