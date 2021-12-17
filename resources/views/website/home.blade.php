@extends('layout.main')

@section('konten')

@include('website.konten')

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="container">
                    <div class="row">
                        @include ('layout.sidebar')
                        <div class="col-sm-9 padding-right">
                            <div class="features_items"><!--features_items-->
                                <h2 class="title text-center">Features Items</h2>
                                @foreach($products as $product)
                                <div class="col-sm-4">	
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/images/product/{{$product->image}}" width="200px" height="250px" alt="" />
                                                <h2>{{$product->price}}</h2>
                                                <p>{{$product->name}} </p>
                                                <?php $cek = 0; ?>
                                                @foreach ($carts as $cart)
                                                        @if($cart->product_id === $product->id)
                                                            <?php $cek++; ?>
                                                        @endif
                                                    @endforeach
                                                    @if(!$cek)
                                                <a href="/addToCart/{{ $product->id }}/{{ Auth::user()->id }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                @else
                                                <a href="/cart" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Go to cart</a>
                                                @endif
                                            </div>
                                            <div class="product-overlay">
                                                <div class="overlay-content">
                                                    <h2>{{$product->price}}</h2>
                                                    <p>{{$product->name}}</p>
                                                    @foreach ($carts as $cart)
                                                        @if($cart->product_id === $product->id)
                                                            <?php $cek++; ?>
                                                        @endif
                                                    @endforeach
                                                    @if(!$cek)
                                                    <a href="/addToCart/{{ $product->id }}/{{ Auth::user()->id }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                    @else
                                                    <a href="/cart" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Go to cart</a>
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="choose">
                                            <ul class="nav nav-pills nav-justified">
                                                <li><a href="/product/detail/{{ $product->id }}">Detail Produk</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>	
                                @endforeach
                                <ul class="pagination">
                                    <li class="active"><a href="">1</a></li>
                                    <li><a href="">2</a></li>
                                    <li><a href="">3</a></li>
                                    <li><a href="">&raquo;</a></li>
                                </ul>
                            </div><!--features_items-->
                        </div>
                    </div>
            
                
                
                
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>
                    
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                @foreach ($rekom as $product )
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/images/product/{{$product->image}}" widht="130px" height="300px" alt="" />
                                                <h2>${{ $product->price }}</h2>
                                                <p>{{ $product->name }}</p>
                                                <?php $cek = 0; ?>
                                                @foreach ($carts as $cart)
                                                        @if($cart->product_id === $product->id)
                                                            <?php $cek++; ?>
                                                        @endif
                                                    @endforeach
                                                    @if(!$cek)
                                                    <a href="/addToCart/{{ $product->id }}/{{ Auth::user()->id }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                    @else
                                                    <a href="/cart" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Go to cart</a>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach	
                            </div>
                        </div>
                         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                          </a>
                          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                          </a>			
                    </div>
                </div><!--/recommended_items-->
                
            </div>
        </div>
    </div>
</section>

@endsection