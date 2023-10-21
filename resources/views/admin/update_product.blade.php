<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('admin.css')
    <style>
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .text_color {
            color: #000;
            /* padding-bottom: 20px; */
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 15px;
        }

        .preview-image {
            width: 100px;
            height: 100px;
        }

        .div_preview_image {
            width: 300px;
            height: 300px;
            margin: auto;
        }

        .div_preview_image img {
            width: 100%;
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
                    <h1 class="font_size">Add Products</h1>
                    <form action="{{ url('update_product_confirm', $product->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="div_design">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="text_color" required value="{{ $product->title }}">
                        </div>
                        <div class="div_design">
                            <label for="title">Description</label>
                            <input type="text" name="description" class="text_color" required value="{{ $product->description }}">
                        </div>
                        <div class="div_design">
                            <label for="title">Price</label>
                            <input type="number" name="price" class="text_color" required value="{{ $product->price }}">
                        </div>
                        <div class="div_design">
                            <label for="title">Discount</label>
                            <input type="number" name="discount_price" class="text_color" required value="{{ $product->discount_price }}">
                        </div>
                        <div class="div_design">
                            <label for="title">Quantity</label>
                            <input type="number" name="quantity" class="text_color" min="0" required value="{{ $product->quantity }}">
                        </div>
                        <div class="div_design">
                            <label for="title">Category</label>
                            <select name="category" id="" class="text_color" required>
                                @foreach($category as $category)
                                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="div_preview_image">
                            <label for="title">Current Image</label>
                            <img style="width: 150px; height: 200px; margin: auto;" id="preview-image" src="/product/{{ $product->image }}" alt="Preview Image">
                        </div>
                        <div class="div_design">
                            <label for="title">Image</label>
                            <input type="file" name="image" accept=".jpg, .jpeg, .png, .webp" value="{{ $product->image }}">
                        </div>
                        <div class="div_design">
                            <input type="submit" value="Update Product" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
        <script>
            function previewImage(event) {
                var reader = new FileReader();
                reader.onload = function() {
                    var preview = document.getElementById('preview-image');
                    preview.src = reader.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(event.target.files[0]);
            }

            var fileInput = document.getElementsByName('image')[0];
            fileInput.addEventListener('change', previewImage);
        </script>
</body>

</html>