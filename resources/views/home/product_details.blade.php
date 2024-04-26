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
    @include('sweetalert::alert')

    <div class="hero_area" style="min-height: 0;">
        <!-- header section start -->
        @include('home.header')
        <!-- end header section -->

    </div>

    <!-- product detail start -->

    <section>
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-4 p-5"><img class="card-img-top mb-5 mb-md-0" src="{{ $product->image }}" alt="..." /></div>
                <div class="col-md-8">
                    <div class="small mb-1">SKU: {{ $product->category}} {{ $product->id }}</div>
                    <h4 class="display-5 fw-bolder">{{ $product->title }}</h4>
                    <div class="fs-5 mb-5">

                        @if($product->discount_price != null)
                        <span style="color: #f7444e; font-weight: bold; margin: 0 6px 0 0;">
                            ${{$product->discount_price}}
                        </span>

                        <span style="text-decoration: line-through;">
                            ${{$product->price}}
                        </span>
                        @else
                        <h6 style="color: #f7444e; font-weight: bold">
                            ${{$product->price}}
                        </h6>
                        @endif

                    </div>
                    <h6>{{ $product->description }}</h6>
                    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p>
                    <div class="d-flex">
                        <form action="{{url('add_cart',$product->id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4" style="width: 100px;">
                                    <input type="number" name="quantity" value="1" min="1">

                                </div>

                                <div class="col-md-4">

                                    <input type="submit" value="Add To Cart">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
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