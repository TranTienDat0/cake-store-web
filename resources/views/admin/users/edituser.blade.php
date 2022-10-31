@extends('layout.layoutAdmin')

@section('title')
    <title>Edit User</title>

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
                        <form action="{{ route('update_user', ['user_id'=>$user->user_id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">Name: </label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Enter name" id="email">
                              </div>
                              <div class="form-group">
                                  <label for="email">UserName: </label>
                                  <input type="email" name="username" value="{{ $user->username }}" class="form-control" placeholder="Enter emali" id="email">
                              </div>
                              <div class="form-group">
                                  <label for="email">Password: </label>
                                  <input type="password" name="password" value="{{ $user->password }}" class="form-control" placeholder="Enter password" id="email">
                              </div>                    
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                          </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
