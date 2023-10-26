<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('admin.css')
</head>
<style>
    .email-form {
        margin: auto;
    }

    .div-center {
        text-align: center !important;
        margin: 20px 0;
    }

    .div-design {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    label {
        display: inline-block;
        width: 200px;
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
                <div>
                    <h1 class="text-center">Send Email to {{ $order->email }}</h1>
                    <form action="{{ url('send_user_email', $order->id) }}" method="POST" enctype="multipart/form-data" class="email-form">

                        @csrf

                        <div class="div-center">
                            <label for="">Email Greeting</label>
                            <input type="text" name="greeting" style="color: #000">
                        </div>
                        <div class="div-center">
                            <label for="">Email First Line</label>
                            <input type="text" name="first" style="color: #000">
                        </div>
                        <div class="div-center">
                            <label for="">Email Body</label>
                            <input type="text" name="body" style="color: #000">
                        </div>
                        <div class="div-center">
                            <label for="">Email Last Line</label>
                            <input type="text" name="last" style="color: #000">
                        </div>
                        <div class="div-design">
                            <input type="submit" class="btn btn-primary" value="Send">
                        </div>
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