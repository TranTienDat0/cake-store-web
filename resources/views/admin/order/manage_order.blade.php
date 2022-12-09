@extends('admin.layout.layoutAdmin')

@section('title')
    <title>Manage order</title>

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection


@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage order</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Manage order</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    {{-- <div class="col-md-12">
                        <a href="{{ route('newProduct') }}" class="btn btn-success float-right m-2">Add product</a>
                    </div> --}}
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên khách hàng</th>
                                    <th scope="col">Tổng tiền</th>
                                    <th scope="col">Tình trạng</th>                                    
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_order as $order)
                                    <tr>
                                        <th scope="row">{{ $order->order_id }}</th>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->order_total }}</td>
                                        <td>{{ $order->order_status }}</td>
                                        {{-- <td>
                                            <img width="100px" height="70px" src="{{asset('uploads/img/'. $product->image) }}" alt="">
                                        </td>
                                        <td>
                                            
                                        </td> --}}
                                        <td>
                                            <a href="{{ URL::to('view-order', ['order_id' => $order->order_id]) }}"
                                                class="btn btn-default">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="col-md-12">
                        {{ $all_order->links('pagination::bootstrap-4') }}
                    </div> --}}
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection
