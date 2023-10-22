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
            width: 100%;
            margin: auto;
            padding-top: 40px;
            text-align: center;
            border: 2px solid white;
        }

        .th_deg {
            background-color: green;
        }
        
        th, td {
            padding: 8px;
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
                <table class="table_deg">
                    <tr class="th_deg">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product title</th>
                        <th>Total Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                    </tr>

                    @foreach($order as $item)

                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->product_item}}</td>
                        <td>{{$item->total_price}}</td>
                        <td>{{$item->payment_status}}</td>
                        <td>{{$item->delivery_status}}</td>
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