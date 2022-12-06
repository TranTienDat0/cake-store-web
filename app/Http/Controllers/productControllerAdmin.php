<?php

namespace App\Http\Controllers;

use App\Models\CategoryAdmin;
use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Models\Products;
use App\Models\ProductsAdmin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;


class productControllerAdmin extends Controller
{
    private $category;
    private $product;
    public function __construct(CategoryAdmin $category, ProductsAdmin $product)
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
        $image = $request->file('image')->move("img",$filename);
       
        $name = request("name");
        $category_id = request("parent_id");
        $content = request("content");
        $price = request("price");
        $views_count = request("views_count");
       
        //update ban ghi
        DB::table("Products")->insert(["name"=>$name,"price"=>$price,"content"=>$content,"category_id"=>$category_id,"image"=>$image,"views_count"=>$views_count]);
        return redirect()->route('product');
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->id);

        return view('admin.products.editProduct', compact('product', 'htmlOption'));

    }

    public function update($id, Request $request)
    {
        $filename = $request->image->getClientOriginalName();
        $image = $request->file('image')->move('uploads',$filename);
       
        $name = request("name");
        $category_id = request("parent_id");
        $content = request("content");
        $price = request("price");
        $views_count = request("views_count");
       
        //update ban ghi
        DB::table("Products")->where("id","=",$id)->update(["name"=>$name,"price"=>$price,"content"=>$content,"category_id"=>$category_id,"image"=>$image,"views_count"=>$views_count]);
        return redirect()->route('product');
    }

    public function delete($id)
    {
        $this->product->find($id)->delete();
        return redirect()->route('product');
    }
}
