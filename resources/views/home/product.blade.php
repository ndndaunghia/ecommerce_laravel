<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{ url('product_details', $product->id) }}" class="option1">
                                Detail
                            </a>
                            <a href="" class="option2">
                                Buy Now
                            </a>
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