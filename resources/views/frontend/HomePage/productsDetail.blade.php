<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product Details</title>
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
    @include('frontend.layout.header');

    <section>
        <div class="container">
            <div class="row">
                @include('frontend.layout.sliderbar');

                <div class="col-sm-9 padding-right">
                    @foreach ($products as $pro)
                        <div class="product-details">
                            <!--product-details-->
                            <div class="col-sm-5">
                                <div class="view-product">
                                    <img src="{{ asset('uploads/img/' . $pro->image) }}" alt="" />
                                    <h3>ZOOM</h3>
                                </div>
                                <div id="similar-product" class="carousel slide" data-ride="carousel">

                                    <!-- Controls -->
                                    <a class="left item-control" href="#similar-product" data-slide="prev">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                    <a class="right item-control" href="#similar-product" data-slide="next">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>

                            </div>
                            <div class="col-sm-7">

                                <div class="product-information">
                                    <!--/product-information-->
                                    <h2>{{ $pro->name }}</h2>
                                    <p>Web ID: {{ $pro->id }}</p>
                                    <img src="{{ asset('eshopper/images/product-details/rating.png') }}"
                                        alt="" />
                                    <br>
                                    <span>
                                        <span>{{ number_format($pro->price) }}</span>

                                        <button type="button" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </button>
                                    </span>
                                    <p><b>Content:</b> {{ $pro->content }}</p>                                 
                                    <a href=""><img src="images/product-details/share.png"
                                            class="share img-responsive" alt="" /></a>
                                </div>
                                <!--/product-information-->

                            </div>
                        </div>
                        <!--/product-details-->
                    @endforeach



                    <div class="recommended_items">
                        <!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($productsRecom as $item => $productsItem)
                                    @if ($item % 3 == 0)
                                        <div class="item {{ $item == 0 ? 'active' : '' }}">
                                    @endif
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <a href="{{ route('productDetail', ['id' => $productsItem->id]) }}"
                                                        style="cursor: pointer;">
                                                        <img width="50px" height="150px"
                                                            src="{{ asset('uploads/img/' . $productsItem->image) }}"
                                                            alt="" />
                                                        <h2>{{ number_format($productsItem->price) }} VNĐ</h2>
                                                        <p>{{ $productsItem->name }}</p>
                                                    </a>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($item % 3 == 2)
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                <!--/recommended_items-->

            </div>
        </div>
        </div>
    </section>

    @include('frontend.layout.footer');



    <script src="{{ asset('eshopper/js/jquery.js') }}"></script>
    <script src="{{ asset('eshopper/js/price-range.js') }}"></script>
    <script src="{{ asset('eshopper/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('eshopper/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('eshopper/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('eshopper/js/main.js') }}"></script>
</body>

</html>
