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

    .checkout-btn {
        background-color: #f7444e;
        color: #fff;
        border: 1px solid #f7444e;
    }

    .checkout-btn:hover {
        background-color: #fff;
        color: #f7444e;
    }
</style>

<body>
    <div class="hero_area" style="min-height: 0;">
        <!-- header section start -->
        @include('home.header')
        <!-- end header section -->

    </div>

    <!-- product detail start -->
    <section class="pt-5 pb-5">
        <div class="container">
            @if(session()->has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('success')}}
            </div>
            @endif
            <div class="row w-100">
                <div class="col-lg-12 col-md-12 col-12">
                    <h3 class="display-5 mb-2 text-center">Shopping Cart</h3>
                    <p class="mb-5 text-center">
                        <i class="text-info font-weight-bold">{{ $productCount }}</i> items in your cart
                    </p>
                    <table id="shoppingCart" class="table table-condensed table-responsive">
                        <thead>
                            <tr>
                                <th style="width:60%">Product</th>
                                <th style="width:12%">Price</th>
                                <th style="width:10%">Quantity</th>
                                <th style="width:16%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $cart)
                            <tr>
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-md-3 text-left">
                                            <img src="product/{{ $cart->image }}" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                        </div>
                                        <div class="col-md-9 text-left mt-sm-2">
                                            <h4>{{ $cart->product_title }}</h4>
                                            <p class="font-weight-light">SKU: {{ $cart->product_id }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price">${{ $cart->total_price }}</td>
                                <form action="{{ url('update_cart', $cart->id) }}" method="post">
                                    <td data-th="Quantity">
                                        @csrf
                                        <input type="hidden" name="_method" value="PATCH">
                                        <input type="number" class="form-control form-control-lg text-center" name="quantity" value="{{ $cart->quantity }}" min="1">
                                    </td>
                                    <td class="actions" data-th="">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-refresh" aria-hidden="true"></i>
                                            </button>
                                            <a class="btn btn-danger" style="cursor: pointer;" href="{{ url('/remove_product_cart', $cart->id) }}" onclick="return confirm('Are you sure to remove this product?')">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </td>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-right text-right">
                        <h4>Subtotal:</h4>
                        <h2>${{ $subTotal }}</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-4 d-flex align-items-center">
                <div class="col-sm-6 order-md-2 text-right">
                    <a href="{{ url('cash_order') }}" class="btn checkout-btn">Cash on delivery</a>
                    <a href="{{url('stripe',$subTotal)}}" class="btn checkout-btn">Pay using card</a>
                </div>
                <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                    <a href="/" class="option1" style="font-weight: 600">
                        Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- product detail end -->

    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->

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