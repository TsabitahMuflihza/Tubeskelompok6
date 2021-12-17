@extends('layout.main')

@section('konten')


<section>
    <div class="container">
        <div class="row">
            @include('layout.sidebar')
            
				
					<div class="col-sm-9 padding-right">
						<div class="product-details"><!--product-details-->
							<div class="col-sm-5">
								<div class="view-product">
									<img src="/images/product/{{$product->image}}" alt="" />
									<h3>ZOOM</h3>
								</div>
								
							</div>
							<div class="col-sm-7">
								<div class="product-information"><!--/product-information-->
									<img src="images/product-details/new.jpg" class="newarrival" alt="" />
									<h2>{{ $product->name }}</h2>
									<p>Web ID: 1089772</p>
									<img src="" alt="" />
									<span>
										<span>US ${{ $product->price }}</span>
										<label>Quantity:</label>
										<input type="text" value=" {{ $product->stock }}" />
										<button type="button" class="btn btn-fefault cart">
											<i class="fa fa-shopping-cart"></i>
											<?php $cek = 0; ?>
											@foreach ($carts as $cart)
											@if($cart->product_id === $product->id)
											<?php $cek++; ?>
											@endif
											@endforeach
											@if(!$cek)
											<a href="/addToCart/{{ $product->id }}/{{ Auth::user()->id }}" >Add to cart</a>
											@else
											<a href="/cart">Go to cart</a>
											@endif
										</button>
									</span>
									<p><b>Availability:</b> {{ $product->stock > 0 ? 'Tersedia' : 'Habis' }}</p>
									<p><b>Condition:</b> New</p>
									<p><b>Brand:</b> Porti.Id</p>
									<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
								</div><!--/product-information-->
							</div>
						</div><!--/product-details-->
						
						
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
														<img src="/images/product/{{$product->image}}" alt="" />
														<h2>${{ $product->price }}</h2>
														<p>{{ $product->name }}</p>
														<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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