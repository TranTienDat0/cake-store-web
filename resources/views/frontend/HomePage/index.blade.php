<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Cake-Shopper</title>
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
                    <div class="features_items">
                        <!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                        @foreach ($products as $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="{{ route('productDetail', ['id' => $product->id]) }}"
                                                style="cursor: pointer;">
                                                <img width="50px" height="150px"
                                                    src="{{ asset('uploads/img/' . $product->image) }}"
                                                    alt="" />
                                                <h2>{{ number_format($product->price) }} VNĐ</h2>
                                                <p>{{ $product->name }}</p>
                                            </a>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <form action="{{ URL::to('cart') }}" method="post">
                                                    {{ csrf_field() }}
                                                    <a href="{{ route('productDetail', ['id' => $product->id]) }}"
                                                        style="cursor: pointer;">
                                                        <h2>{{ number_format($product->price) }} VNĐ</h2>
                                                        <p>{{ $product->name }}</p>
                                                        <input name="qty" type="hidden" min="1" value="1" />
                                                        <input name="productid_hidden" type="hidden" value="{{ $product->id }}"/>
                                                        <button type="submit" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Add to cart</button>
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!--features_items-->

                    <div class="category-tab">
                        <!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                @foreach ($categorys as $item => $categoryItem)
                                    <li class="{{ $item == 0 ? 'active' : '' }}"><a
                                            href="#category_cat_{{ $categoryItem->id }}"
                                            data-toggle="tab">{{ $categoryItem->categoriesName }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-content">
                            @foreach ($categorys as $ProductsItem => $categoryItemPro)
                                <div class="tab-pane fade {{ $ProductsItem == 0 ? 'active in' : '' }}"
                                    id="category_cat_{{ $categoryItemPro->id }}">
                                    @foreach ($categoryItemPro->products as $ProductsTab)
                                        <div class="col-sm-3">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <form action="{{ URL::to('cart') }}" method="post">
                                                            {{ csrf_field() }}
                                                            <span>
                                                                <a href="{{ route('productDetail', ['id' => $ProductsTab->id]) }}"
                                                                    style="cursor: pointer;">
                                                                    <img width="50px" height="150px"
                                                                        src="{{ asset('uploads/img/' . $ProductsTab->image) }}"
                                                                        alt="" />
                                                                    <h2>{{ number_format($ProductsTab->price) }} VNĐ
                                                                    </h2>
                                                                    <p>{{ $ProductsTab->name }}</p>
                                                                    <input name="qty" type="hidden" min="1" value="1" />
                                                                    <input name="productid_hidden" type="hidden" value="{{ $ProductsTab->id }}"/>
                                                                </a>                                                               
                                                                <button type="submit" class="btn btn-default add-to-cart"><i
                                                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                                                            </span>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!--/category-tab-->

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
                                                    <form action="{{ URL::to('cart') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <a href="{{ route('productDetail', ['id' => $productsItem->id]) }}"
                                                            style="cursor: pointer;">
                                                            <img width="50px" height="150px"
                                                                src="{{ asset('uploads/img/' . $productsItem->image) }}"
                                                                alt="" />
                                                            <h2>{{ number_format($productsItem->price) }} VNĐ</h2>
                                                            <p>{{ $productsItem->name }}</p>
                                                        </a>
                                                        <input name="qty" type="hidden" min="1" value="1" />
                                                        <input name="productid_hidden" type="hidden" value="{{ $productsItem->id }}"/>
                                                        <button type="submit" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Add to cart</button>
                                                    </form>

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
                        <a class="right recommended-item-control" href="#recommended-item-carousel"
                            data-slide="next">
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
    <script src="{{ asset('eshopper/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('eshopperjs/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('eshopper/js/price-range.js') }}"></script>
    <script src="{{ asset('eshopper/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('eshopper/js/main.js') }}"></script>
</body>

</html>
