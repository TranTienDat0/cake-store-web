@extends('admin.layout.layoutAdmin')

@section('title')
    <title>Add Category</title>

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
                        <form action="{{ route('store') }}" method="post">
                            @csrf
                            <div class="form-group">
                              <label for="email">Tên danh mục:</label>
                              <input type="text" name="categoriesName" class="form-control" placeholder="Enter tên danh mục" id="email">
                            </div>
                            <div class="form-group">
                              <label for="pwd">Chọn danh mục cha:</label>
                              <select class="form-control" name="parent_id">
                                <option value="0">Chọn danh mục</option>
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
