@extends('layouts.index')

@section('content')
    <div class="tab-content" id="myTabContent">
            <div class="tab-pane show active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
            <div class="promo-section-heading">
        <h2>Nhà Sách Unicorn - Nhà Sách Hàng Đầu Đà Nẵng</h2>
    </div>
<div class="row">
    @foreach($products as $product)
    <div class="col-md-2">
        <div class="single-slide">
            <div class="product-card">
                <div class="product-header">
                    <!-- <a href="" class="author">
                        jpple
                    </a> -->
                </div>
                <div class="product-card--body">
                    <div class="card-image">
                        <img src="{{url(asset('./img'))}}/{{$product->image}}" alt="img">
                        <div class="hover-contents">
                            <a href="product-details.html" class="hover-image">
                            </a>
                            <div class="hover-btns">
                                <a href="{{route('product.detail',$product->id)}}" class="single-btn">
                                    <i class="fas fa-shopping-basket"></i>
                                </a>
                                
                                <!-- <a href="{{route('product.detail',$product->id)}}" data-toggle="modal" data-target="#quickModal"
                                    class="single-btn">
                                    <i class="fas fa-eye"></i>
                                </a> -->
                                <button type="button" class="single-btn" name="add-to-cart">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="price-block">
                        <span class="price" style="font-size:15px;">{{number_format($product->price)}} VNĐ</span>
                        <h4><a href="product-details.html">{{$product->name}}</a></h4>

                       <!--  <del class="price-old">70.000VNĐ</del>
                        <br>
                        <span class="price-discount">Sale 20%</span> -->
                    </div>
                </div>
               
            </div>
        </div>
    </div>  
    @endforeach
</div>
{{$products->links()}}
@endsection
    
