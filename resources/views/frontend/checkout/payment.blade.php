<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout | Cake-Shopper</title>
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
</head><!--/head-->

<body>
	@include('frontend.layout.headerCart');

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{ asset('home') }}">Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div><!--/breadcrums-->


			<div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
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
            <div class="review-payment">
                <h2>Chọn hình thức thanh toán</h2>
            </div>
		    
			<form action="{{ URL::to('order-place') }}" method="POST">
                {{ csrf_field() }}
                <div class="payment-options" style="margin-top: 20px">
					<span>
						<label><input name="payment_options" value="1" type="checkbox"> Thanh toán bằng thẻ ATM</label>
					</span>
					<span>
						<label><input name="payment_options" value="2" type="checkbox"> Thanh toán bằng tiền mặt</label>
					</span>
					<span>
						<label><input name="payment_options" value="3" type="checkbox"> Thanh toán bằng thẻ ghi nợ</label>
					</span>
                    <input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm" />
			    </div>
            </form>
		</div>
	</section> <!--/#cart_items-->



    @include('frontend.layout.footer');
	

  
    <script src="{{ asset('eshopper/js/jquery.js') }}"></script>
    <script src="{{ asset('eshopper/js/price-range.js') }}"></script>
    <script src="{{ asset('eshopper/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('eshopper/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('eshopper/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('eshopper/js/main.js') }}"></script>
</body>
</html>