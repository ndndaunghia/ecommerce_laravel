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

    <!-- info detail start -->
    <h3 class="text-center">Profile User </h3>
    <div class="row">
        <div class="col-sm-4 col-md-2 col-lg-2 text-center" style="margin: auto;">
            <div class="row my-2">
                <label for="">Name</label>
                <input class="form-control" type="text" placeholder="{{ $user->name }}" readonly>
            </div>
            <div class="row my-2">
                <label for="">Email</label>
                <input class="form-control" type="text" placeholder="{{ $user->email }}" readonly>
            </div>
            <div class="row my-2">
                <label for="">Phone number</label>
                <input class="form-control" type="text" placeholder="{{ $user->phone }}" readonly>
            </div>
            <div class="row my-2">
                <label for="">Address</label>
                <input class="form-control" type="text" placeholder="{{ $user->address }}" readonly>
            </div>
        </div>
    </div>
    <!-- info detail end -->

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