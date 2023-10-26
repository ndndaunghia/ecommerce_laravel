<!DOCTYPE html>
<html>

<head>
    <base href='/public'>

    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>N T N Fashion</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
</head>

<style>
    .add-btn {
        display: inline-block;
        padding: 6px 40px;
        border-radius: 0;
        -webkit-transition: all 0.3s;
        transition: all 0.3s;
        border-radius: 6px;
        border: 1px solid #f7444e;
    }

    .add-btn:hover {
        background-color: #f7444e;
        color: #ffffff;
    }
</style>

<body>
    <div class="hero_area" style="min-height: 0;">
        <!-- header section start -->
        @include('home.header')
        <!-- end header section -->

    </div>

    <!-- product detail start -->

    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    <span>{{ $selected_category->category_name }}</span>
                </h2>
            </div>
            <div class="row">
                @foreach($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{ url('product_details', $product->id) }}" class="option1" style="font-weight: 600">
                                    Detail
                                </a>
                                <form action="{{url('add_cart',$product->id)}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="options">
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="submit" value="Add To Cart" class="option1 add-btn">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="product/{{ $product->image }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                {{$product->title}}
                            </h6>

                            @if($product->discount_price != null)
                            <h6 style="color: #f7444e">
                                ${{$product->discount_price}}
                            </h6>

                            <h6 style="text-decoration: line-through;">
                                ${{$product->price}}
                            </h6>
                            @else
                            <h6 style="color: #f7444e">
                                ${{$product->price}}
                            </h6>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- <div class="btn-box">
            <a href="">
                Show All Products
            </a>
        </div> -->
        </div>
    </section>
    <!-- product detail end -->

    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->

    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>
    <!-- jQery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>
</body>

</html>