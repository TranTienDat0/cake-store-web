@extends('layout.layoutAdmin')

@section('title')
    <title>Edit Product</title>

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('update_product', ['id'=>$product->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <label>Tên sản phẩm:</label>
                              <input type="text" name="name" class="form-control" value="{{ $product->name }}" placeholder="Enter tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label >Giá sản phẩm:</label>
                                <input type="text" name="price" class="form-control" value="{{ $product->price }}" placeholder="Enter giá sản phẩm">
                              </div>    
                            <div class="form-group">
                                <label>Ảnh đại diện:</label>
                                <input type="file" name="image" class="form-control-file">
                            </div>
                           
                            <div class="form-group">
                                <label>Nhập nội dung: </label>
                                <textarea name="content" id="content">{{ isset($product->content) ? $product->content : '' }}</textarea>
                            </div>                                     
                            <div class="form-group">
                              <label for="pwd">Chọn danh mục:</label>
                              <select class="form-control" name="parent_id">
                                <option value="0"><?php
                                    $category = DB::table('tb_category')
                                        ->where('id', '=', $product->category_id)
                                        ->first();
                                    echo isset($category->categoriesName) ? $category->categoriesName : '';
                                    ?></option>
                                {{!! $htmlOption !!}}
                              </select>
                            </div>                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection


