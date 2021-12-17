<div class="col-sm-3">
	<div class="left-sidebar">
		<h2>Category</h2>
		<div class="panel-group category-products" id="accordian">
			<!--category-productsr-->
							@foreach($categories as $arr)	
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="/product/categori/{{ $arr->id }}">{{ $arr->name }}</a></h4>
								</div>	
							</div>
							@endforeach
						</div><!--/category-productsr-->
					
						<div class="brands_products mb-4"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									@foreach($brand as $arr)
									<?php $i = 0; ?>
									<li><a href="/product/brand/{{ $arr->id }}"> <span class="pull-right">(
										@foreach ($all as $product)
											@if($arr->id == $product->brand_id)
											<?php $i++; ?>
											@endif
										@endforeach
										{{ $i }}
										)</span>{{ $arr->name }}</a></li>
									@endforeach
								</ul>
							</div>
						</div><!--/brands_products-->
						
						
						
					</div>
			</div>