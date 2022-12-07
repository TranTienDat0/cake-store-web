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
				  <li class="active">Điền thông tin người mua hàng</li>
				</ol>
			</div><!--/breadcrums-->


			<div class="register-req">
				<p>Làm ơn đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Điền thông tin gửi hàng</p>
							<div class="form-one">
								<form action="{{ URL::to('/save-checkout-customer') }}" method="post">
                                    {{ csrf_field() }}
									
									<input type="text" name="email" placeholder="Địa chỉ email">									
									<input type="text" name="name" placeholder="Họ và tên">
									<input type="text" name="address" placeholder="Địa chỉ">
									<input type="text" name="phone" placeholder="Số điện thoại">
                                    <textarea name="note"  placeholder="Ghi chú đơn hàng" rows="16"></textarea>
                                    <input type="submit" value="Thanh toán" name="send_order"
                                    class="btn btn-primary btn-sm" />									
								</form>
							</div>
							<div class="form-two">
								
							</div>
						</div>
					</div>
									
				</div>
			</div>
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