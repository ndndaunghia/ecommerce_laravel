<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
        .title_deg {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            padding-bottom: 40px;
        }

        .table_deg {
            max-width: 1000px;
            /* width: 100%; */
            margin: auto;
            text-align: center;
            border: 2px solid white;
        }

        .th_deg {
            background-color: green;
        }

        th,
        tr,
        td {
            padding: 2px;
            border: 1px solid #fff;
            border-collapse: collapse;
        }

        .sub_table th,
        td {
            border: 1px solid green;
            border-collapse: collapse;
        }

        .image_size {
            width: 50px;
        }

        .search-form {
            float: right;
            margin: 0 24px 20px 0;
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
                <h1 class="title_deg">All Orders</h1>

                <div style="padding-bottom: 20px;">

                    <form action="{{url('search')}}" method="get" class="search-form">

                        @csrf

                        <input type="text" name="search" style="color: black; padding-right: 20px;" placeholder="Search For Something">

                        <input type="submit" name="submit" class="btn btn-outline-primary" style="padding: 12px 20px;" value="Search">

                    </form>

                </div>

                <table class="table_deg">
                    <tr class="th_deg">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Order</th>
                        <th>Total Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Delivered</th>
                    </tr>
                    @forelse($order as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->phone}}</td>
                        <td>
                            <table class="sub_table">
                                <tr>
                                    <th>Title</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                </tr>
                                @foreach(json_decode($item->product_item) as $s)
                                <tr>
                                    <td>{{ htmlspecialchars($s->product_title) }}</td>
                                    <td>{{ htmlspecialchars($s->quantity) }}</td>
                                    <td>{{ htmlspecialchars($s->price) }}</td>
                                    <td>
                                        <img class="image_size" src="/product/{{ htmlspecialchars($s->image) }}" alt="">
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </td>
                        <td>{{$item->total_price}}</td>
                        <td>{{$item->payment_status}}</td>
                        <td>{{$item->delivery_status}}</td>
                        <td>
                            @if($item->delivery_status == "processing")
                            <a href="{{url('delivered', $item->id)}}" onclick="return confirm('Confirm this product has been delivered')" class="btn btn-primary">Delivered</a>
                            @else
                            <p style="color: green; font-weight: bold;">Delivered</p>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10">
                            <p style="color: red; font-weight: bold;">No Order Found</p>
                        </td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>