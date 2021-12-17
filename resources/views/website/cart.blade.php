@extends('layout.main')

@section('konten')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>

        @include('sweetalert::alert')

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Produk</td>
                        <td class="description"></td>
                        <td class="price">Harga</td>
                        <td class="quantity">Kuantitas</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    @foreach ($carts as $cart )
                    <?php $total += ($cart->product->price * $cart->quantity); ?>
                    <tr>
                        <td class="cart_product">
                            <a href=""><img width="78px" src="/images/product/{{$cart->product->image}}" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $cart->product->name }}</a></h4>
                            <p>Brand: {{ $cart->product->brand->name }}</p>
                        </td>
                        <td class="cart_price">
                            <p>{{ $cart->product->price }} IDR</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href="/cart/addQuantity/{{ $cart->id }}"> + </a>
                                <form action="/cart/updateQuantity" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $cart->id }}">
                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart->quantity }}" autocomplete="off" size="2">
                                    <a class="cart_quantity_down" href="/cart/deleteQuantity/{{ $cart->id }}"> - </a>
                                    <button id="upd" type="submit">Update Quantity</button>
                                </form>
                                
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price"> {{ $cart->product->price * $cart->quantity }}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="/deleteCart/{{ $cart->product_id }}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach        
                </tbody>
            </table>
        </div>
        <div id="upd_text">
            <p>Update kuantitas jika kamu input</p>
        </div> 
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>Apa langkah selanjutnya ? </h3>
            <p>Lakukan checkout ,Biaya ongkir akan ditentukan oleh admin setelah checkout dan konfirmasi.</p>
        </div>
        <div class="row" >
            <div class="col-sm-6" style="float:right">
                <div class="total_area" >
                    <ul>
                        <li>Total belanjaan <span>{{ $total }} IDR</span></li>
                        <li>Biaya pajak <span>0 IDR</span></li>
                        <li>Total <span>{{ $total }} IDR</span></li>
                        <form method="post" action="/checkout">
                            @csrf
                            
                            <input type="radio" id="ambilSendiri" value="ambilSendiri" name="shipping_company">
                            <label for="ambilSendiri">Ambil sendiri</label>
                            <input type="radio" id="pengantaran" value="pengantaran" name="shipping_company">
                            <label for="pengantaran">Pengantaran</label>
                            <textarea name="address" style="height: 200px"  placeholder="Masukkan alamat anda jika memilih pengantaran" rows="16"></textarea>
                            <button style="float:right; margin-top:20px"class="btn btn-default check_out">Check Out</a>
                        </form>
                    </ul>
                    <ul>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->

@endsection