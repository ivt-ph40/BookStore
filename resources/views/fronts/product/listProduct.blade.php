@section('content')
    <div class="tab-content" id="myTabContent">
            <div class="tab-pane show active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
            <div class="promo-section-heading">
        <h2>Most View Product</h2>
    </div>
<div class="row">
    @foreach($products as $product)
    <div class="col-md-2">
        <div class="single-slide">
            <div class="product-card">
                <div class="product-header">
                    <a href="" class="author">
                        jpple
                    </a>
                    <h3><a href="product-details.html">Rpple iPad with Retina Display
                            MD510LL/A</a></h3>
                </div>
                <div class="product-card--body">
                    <div class="card-image">
                        <img src="{{url(asset('./img'))}}/{{$product->image}}" alt="img">
                        <div class="hover-contents">
                            <a href="product-details.html" class="hover-image">
                            </a>
                            <div class="hover-btns">
                                <a href="cart.html" class="single-btn">
                                    <i class="fas fa-shopping-basket"></i>
                                </a>
                                <a href="wishlist.html" class="single-btn">
                                    <i class="fas fa-heart"></i>
                                </a>
                                <a href="compare.html" class="single-btn">
                                    <i class="fas fa-random"></i>
                                </a>
                                <a href="{{route('fronts.product.show', $product->id)}}" class="single-btn">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="price-block">
                        <span class="price">{{$product->price}} VNĐ</span>
                       <!--  <del class="price-old">70.000VNĐ</del>
                        <br>
                        <span class="price-discount">Sale 20%</span> -->
                    </div>
                </div>
                <br>
                <hr>
                <br>
            </div>
        </div>
    </div>  
    @endforeach
</div>
<br>
    
