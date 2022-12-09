@extends('admin.layout.layoutAdmin')

@section('title')
    <title>List order</title>

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
                        <h1 class="m-0">Thông tin khách hàng</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">List Order</li>
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
                                    <th scope="col">Địa chỉ email</th>
                                    <th scope="col">Số điện thoại</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                    <tr>
                                        <th scope="row">{{ $order_by_id->customer_id }}</th>
                                        <td>{{ $order_by_id->customer_name }}</td>
                                        <td>{{ $order_by_id->customer_email }}</td> 
                                        <td>{{ $order_by_id->customer_phone }}</td> 
                                    </tr>
                                
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
        
       <h2 style="margin: 30px 10px">Thông tin vận chuyển</h2>
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
                                    <th scope="col">Tên người nhận hàng</th>
                                    <th scope="col">Địa chỉ cần giao</th>
                                    <th scope="col">Số điện thoại</th>                                                                       
                                </tr>
                            </thead>
                            <tbody>
                               
                                    <tr>
                                        <th scope="row">{{ $order_by_id->shipping_id }}</th>
                                        <td>{{ $order_by_id->name }}</td>
                                        <td>{{ $order_by_id->address }}</td>
                                        <td>{{ $order_by_id->phone }}</td>                                                                            
                                    </tr>
                                
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
        
       <h2 style="margin: 30px 10px">Liệt kê chi tiết đơn hàng</h2>
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
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Giá bán</th>                                    
                                    <th scope="col">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($order_by_id as $order) --}}
                                    <tr>
                                        <th scope="row">{{ $order_by_id->order_detail_id }}</th>
                                        <td>{{ $order_by_id->product_name }}</td>
                                        <td>{{ $order_by_id->product_sales_quantity }}</td>
                                        <td>{{ number_format($order_by_id->product_price) }}</td>                                      
                                        <td>{{ $order_by_id->order_total }}</td>
                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="col-md-12">
                        {{ $all_order->links('pagination::bootstrap-4') }}
                    </div> --}}
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
    
   
@endsection
