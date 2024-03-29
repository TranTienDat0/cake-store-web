<header id="header">
    <!--header-->
    <div class="header_top">
        <!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> tiendat@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header_top-->

    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left">
                        <a href="index.html"><img src="images/home/logo.png" alt="" /></a>
                    </div>
                    <div class="btn-group pull-right clearfix">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="">Canada</a></li>
                                <li><a href="">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="">Canadian Dollar</a></li>
                                <li><a href="">Pound</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav">                         
                            <?php
                            $email = Session::get('customer_email');
                            if($email != null){
                        ?>
                            <li><a href=""><i class="fa fa-lock"></i> <?php echo $email ?></a></li>
                            <?php 
                            }else{
                        ?>
                            <li><a href="{{ URL::to('/login-check') }}"><i class="fa fa-user"></i> Tài khoản</a></li>
                            <?php } ?>
                            
                            <li><a href=""><i class="fa fa-star"></i> Yêu thích</a></li>                          
                            <li><a href="{{ route('show-cart') }}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                            <?php
                                $customer_id = Session::get('customer_id');
                                if($customer_id != null){
                            ?>
                            <li><a href="{{ URL::to('/checkout') }}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                            <li><a href="{{ URL::to('/logout-check') }}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
                          
                            <?php 
                                }else{
                            ?>
                            <li><a href="{{ URL::to('/login-check') }}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                            <li><a href="{{ URL::to('/login-check') }}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ asset('home') }}" class="active">Trang chủ</a></li>
                            @foreach ($categorys as $item)
                                <li class="dropdown"><a href="">{{ $item->categoriesName }}<i
                                            class="fa fa-angle-down"></i></a>
                                    @if ($item->categoryChildrent->count())
                                        <ul role="menu" class="sub-menu">
                                            @foreach ($item->categorychildrent as $categorychild)
                                                <li><a
                                                        href="{{ route('listCategory', ['id' => $categorychild->id]) }}">{{ $categorychild->categoriesName }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif

                                </li>
                            @endforeach
                            {{-- <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="blog.html">Blog List</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="404.html">404</a></li> --}}
                            <li><a href="contact-us.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <form action="{{ URL::to('search') }}" method="post">
                        {{ csrf_field() }}
                        <div class="search_box pull-right">
                            <input type="text" name="keyword" placeholder="Search" />
                            <input  type="submit" name="search_items" style="margin-top: 0px; color: #000; width: 50px" class="btn btn-primary btn-sm" value="Search" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
</header>
<!--/header-->
<section id="slider">
    <!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner" style="height: 400px">
                        <div class="item active">
                            <div class="col-sm-6">

                            </div>
                            <div class="col-sm-6">

                                <img src="{{ asset('uploads/img/banner2.jpg') }}" class="pricing" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">

                            </div>
                            <div class="col-sm-6">

                                <img src="{{ asset('uploads/img/banner3.jpg') }}" class="pricing" alt="" />
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
<!--/slider-->
