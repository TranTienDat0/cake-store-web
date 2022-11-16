<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | Cake-Shopper</title>
    <link href="{{ asset('eshopper/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>
    @include('frontend.layout.headerCart');

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <?php
                $content = Cart::content();
                // echo '<pre>';
                //     print_r($content);
                // echo '</pre>';
                ?>
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Hình ảnh</td>
                            <td class="description">Tên sản phẩm</td>
                            <td class="price">Giá</td>
                            <td class="quantity">Số lượng</td>
                            <td class="total">Tổng tiền</td>
                            <td></td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($content as $value)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img width="100px" height="80px"
                                            src="{{ asset('uploads/img/' . $value->options->image) }}"
                                            alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{ $value->name }}</a></h4>
                                    <p>Web ID: {{ $value->id }}</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{ number_format($value->price) }} VNĐ</p>
                                </td>
                                <td class="cart_quantity">

                                    <div class="cart_quantity_button">
                                        <form action="{{ URL::to('update_cart') }}" method="post">
                                            {{ csrf_field() }}
                                            <input class="cart_quantity_input" type="number" name="quantity"
                                                value="{{ $value->qty }}" size="2" />
                                            <input type="hidden" value="{{ $value->rowId }}" name="rowId_pro"
                                                class="form-control" />
                                            <input type="submit" value="Cập nhật" name="update_qty"
                                                class="btn btn-default btn-sm" />
                                        </form>
                                    </div>

                                </td>
                                <td class="cart_total">
                                    <?php
                                    $subtal = $value->price * $value->qty;
                                    echo number_format($subtal) . ' VNĐ';
                                    ?>

                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete"
                                        href="{{ route('delete_cart', ['rowId' => $value->rowId]) }}"><i
                                            class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                    delivery cost.</p>
            </div>
            <div class="row">
                {{-- <div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div> --}}
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Tổng <span>{{ Cart::total(0, ',', ',') }} VNĐ</span></li>
                            <li>Thuế <span>{{ Cart::tax() }} VNĐ</span></li>
                            <li>Phí vận chuyển <span>Free</span></li>
                            <li>Thành tiền <span>{{ Cart::subtotal(0, ',', ',') }} VNĐ</span></li>
                        </ul>
                        {{-- <a class="btn btn-default update" href="">Update</a> --}}
                        
                        <?php
                        $customer_id = Session::get('id');
                        if($customer_id != null){
                        ?>
                        <a class="btn btn-default check_out" href="{{ URL::to('/checkout') }}">Thanh toán</a>
                        <?php 
                        }else{
                        ?>
                        <a class="btn btn-default check_out" href="{{ URL::to('/login-check') }}">Thanh toán</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#do_action-->

    @include('frontend.layout.footer');



    <script src="{{ asset('eshopper/js/jquery.js') }}"></script>
    <script src="{{ asset('eshopper/js/price-range.js') }}"></script>
    <script src="{{ asset('eshopper/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('eshopper/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('eshopper/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('eshopper/js/main.js') }}"></script>
</body>

</html>
