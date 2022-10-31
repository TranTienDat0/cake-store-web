@extends('layout.layoutAdmin')

@section('title')
    <title>Add User</title>

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
                        <form action="{{ route('store_user') }}" method="post">
                            @csrf
                            <div class="form-group">
                              <label for="email">Name: </label>
                              <input type="text" name="name" class="form-control" placeholder="Enter name" id="email">
                            </div>
                            <div class="form-group">
                                <label for="email">UserName: </label>
                                <input type="email" name="username" class="form-control" placeholder="Enter emali" id="email">
                            </div>
                            <div class="form-group">
                                <label for="email">Password: </label>
                                <input type="password" name="password" class="form-control" placeholder="Enter password" id="email">
                            </div>  
                            <div class="form-group">
                                <label for="email">password_confirmation: </label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" id="email">
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
