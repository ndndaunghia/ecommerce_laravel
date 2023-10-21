<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>
<style type="text/css">
    .center {
        margin: auto;
        width: 50%;
        text-align: center;
        margin-top: 40px;
    }

    tr,
    td,
    th {
        border: 1px solid green;
        border-collapse: collapse;
    }

    .title {
        text-align: center;
        font-size: 40px;
    }

    .th_color {
        background-color: #687EFF;
    }

    .th_deg {
        padding: 15px;
    }
</style>

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
                <h1 class="title">List Products</h1>
                <table class="center">
                    <tr class="th_color">
                        <th class="th_deg">Title</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Category</th>
                        <th class="th_deg">Quantity</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Discount Price</th>
                        <th class="th_deg">Image</th>
                        <th class="th_deg">Delete</th>
                        <th class="th_deg">Edit</th>
                    </tr>

                    @foreach($product as $product)

                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount_price }}</td>
                        <td>
                            <img class="image_size" src="/product/{{ $product->image }}" alt="">
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ url('delete_product', $product->id) }}" onclick="return confirm('Are You Sure To Delete This Product')">Delete</a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ url('update_product', $product->id) }}">Edit</a>
                        </td>
                    </tr>

                    @endforeach
                </table>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>