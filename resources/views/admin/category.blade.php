<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
        .div_center {
            text-align: center;
            margin-top: 20px;
        }

        .h2_font {
            font-size: 32px;
            font-weight: bold;
            padding-bottom: 40px;
        }

        .input_color {
            color: black;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.slidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('success')}}
                </div>
                @endif
                <div class="div_center">
                    <h2 class="h2_font">
                        Add Category
                    </h2>
                    <form action="{{url('/add_category')}}" method="post">
                        @csrf
                        <input type="text" class="input_color" name="category" placeholder="Write category name"><br>
                        <input type="submit" class="btn btn-primary" value="Add">
                    </form>
                </div>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>