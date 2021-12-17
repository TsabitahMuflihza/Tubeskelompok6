@extends ('layout.main')

@section ('konten')

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
										<img src="/images/product/{{$product->image}}" alt="" width="150px" height="320px/>
										<h2>{{$product->price}}</h2>
										<p>{{$product->name}}</p>
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
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="/product/detail/{{ $product->id }}">Detail Produk</a></li>
									</ul>
								</div>
							</div>
						</div>	
						@endforeach
						<ul class="pagination no-margin mt-4">
							{{ $products->links("pagination::bootstrap-4") }}
						</ul>
					</div><!--features_items-->
				</div>
			</div>
</div>
	
@endsection