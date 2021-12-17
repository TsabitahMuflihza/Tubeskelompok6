<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php $hal = 0; ?>
                        @foreach ($kontens as $konten)
                            <li data-target="#slider-carousel" data-slide-to="{{ $hal++ }}" class="{{$hal == 1 ? 'active' : '' }}"></li>
                        @endforeach
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>
                    
                    <div class="carousel-inner">
                        <?php $i = 0; ?>
                        @foreach ($kontens as $konten) 
                        <?php $i++; ?>
                        <div class="item {{$i == 1 ? 'active' : '' }}">
                            <div class="col-sm-6">
                                <h1><span>PORTIO.ID</span></h1>
                                <h2>Discount {{$konten->name}} by {{$konten->brand->name}}</h2>
                                <p>{{$konten->info}}</p>
                            <button type="button" class="btn btn-default get"><a href="/product/detail/{{ $konten->id }}">Get it now</a></button>
                            </div>
                            <div class="col-sm-6">
                                {{--  <img src="/images/shop/{{$konten->image}}" class="girl img-responsive" alt="discount" width="400px" height="300px"/>  --}}
                                <img width="300px"src="/images/product/{{$konten->image}}" class="girl img-responsive" alt="" />
                                <img src="/images/home/{{$konten->image}}"  class="pricing" alt="" />
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</section><!--/slider-->