@extends('layout.layoutAdmin')

@section('title')
    <title>Products List</title>

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection
<script>
  function canNotDelete()
{
    alert('Không thể xoá do danh mục này tồn tại sản phẩm');
}
</script>

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Product List</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('newProduct') }}" class="btn btn-success float-right m-2">Add product</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá bán</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($categories as $category) --}}
                                    <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        <td></td> 
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href=""
                                                class="btn btn-default">Edit</a>
                                            <a 
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{-- {{ $categories->links('pagination::bootstrap-4') }} --}}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
