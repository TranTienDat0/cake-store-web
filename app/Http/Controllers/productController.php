<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;


class productController extends Controller
{
    use HasFactory;
    private $category;
    private $product;
    public function __construct(Category $category, Products $product)
    {
        $this->category = $category;
        $this->product = $product;
    }
    public function index(){
        $products = $this->product->paginate(6);
        return view('admin.products.index', compact('products'));
    }
    public function create(){
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
    public function store(Request $request){ 
       
        $filename = $request->image->getClientOriginalName();
        $image = $request->file('image')->move('uploads',$filename);
       
        $name = request("name");
        $category_id = request("parent_id");
        $content = request("content");
        $price = request("price");
       
        //update ban ghi
        DB::table("Products")->insert(["name"=>$name,"price"=>$price,"content"=>$content,"category_id"=>$category_id,"image"=>$image]);
        return redirect()->route('product');
    }
}
