<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Models\CategoryAdmin;

class categoriesControllerAdmin extends Controller
{
    //
    private $category;
    public function __construct(CategoryAdmin $category)
    {
        $this->category = $category;
    }
    public function index(){
        $categories = $this->category->paginate(5);
        return view('admin.category.index',compact('categories'));
    }
    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function create(){
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.category.addCategory', compact('htmlOption'));
    }

    public function store(Request $request){
        $this->category->create([
            'categoriesName' => $request->categoriesName,
            'parent_id' => $request->parent_id
        ]);

        return redirect()->route('category');
    }
    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);

        return view('admin.category.editCategory', compact('category', 'htmlOption'));

    }

    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            'categoriesName' => $request->categoriesName,
            'parent_id' => $request->parent_id,          
        ]);
        return redirect()->route('category');

    }

    public function delete($id)
    {
        $this->category->find($id)->delete();
        return redirect()->route('category');
    }

}
