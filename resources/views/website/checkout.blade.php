@extends('layout.main')

@section('konten')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="step-one">
            <h2 class="heading">Your Bill</h2>
        </div>
        <div class="checkout-options">
            <h3>{{ Auth::user()->name }}</h3>
            {{--  <p>Checkout options</p>
            <ul class="nav">
                <li>
                    <label><input type="checkbox"> Register Account</label>
                </li>
                <li>
                    <label><input type="checkbox"> Guest Checkout</label>
                </li>
                <li>
                    <a href=""><i class="fa fa-times"></i>Cancel</a>
                </li>
            </ul>  --}}
        </div><!--/checkout-options-->

        {{--  <div class="register-req">
            <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
        </div><!--/register-req-->  --}}

        {{--  <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-3">
                    <div class="shopper-info">
                        <p>Shopper Information</p>
                        <form>
                            <input type="text" placeholder="Display Name">
                            <input type="text" placeholder="User Name">
                            <input type="password" placeholder="Password">
                            <input type="password" placeholder="Confirm password">
                        </form>
                        <a class="btn btn-primary" href="">Get Quotes</a>
                        <a class="btn btn-primary" href="">Continue</a>
                    </div>
                </div>
                <div class="col-sm-5 clearfix">
                    <div class="bill-to">
                        <p>Bill To</p>
                        <div class="form-one">
                            <form>
                                <input type="text" placeholder="Company Name">
                                <input type="text" placeholder="Email*">
                                <input type="text" placeholder="Title">
                                <input type="text" placeholder="First Name *">
                                <input type="text" placeholder="Middle Name">
                                <input type="text" placeholder="Last Name *">
                                <input type="text" placeholder="Address 1 *">
                                <input type="text" placeholder="Address 2">
                            </form>
                        </div>
                        <div class="form-two">
                            <form>
                                <input type="text" placeholder="Zip / Postal Code *">
                                <select>
                                    <option>-- Country --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <select>
                                    <option>-- State / Province / Region --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <input type="password" placeholder="Confirm password">
                                <input type="text" placeholder="Phone *">
                                <input type="text" placeholder="Mobile Phone">
                                <input type="text" placeholder="Fax">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="order-message">
                        <p>Shipping Order</p>
                        <textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                        <label><input type="checkbox"> Shipping to bill address</label>
                    </div>	
                </div>					
            </div>
        </div>  --}}
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @if ($arr)
                
                        @foreach ($checkouts as $checkout )
                        <tr style="font-size:10px">
                            <td class="cart_product">
                                <a href=""><img width="60px" src="/images/product/{{$checkout->product->image}}" alt=""></a>
                            </td>
                            <td class="cart_quantity">
                                <div style="margin-left:20px;">
                                    <h4><a href="">{{ $checkout->product->name }}</a></h4>
                                    <p>Brand: {{ $checkout->product->brand->name }}</p>
                                </div>
                            </td>
                            <td class="cart_price">
                                <p>{{ $checkout->product->price }} IDR</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{ $checkout->quantity }}" autocomplete="off" size="2">
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price"> {{ $checkout->product->price * $checkout->quantity }}</p>
                            </td>
                        </tr>
                        @endforeach
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="4">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Total Belanjaan</td>
                                    <td><center> {{ $bill[0]->total }} IDR</center></td>
                                </tr>
                                <tr>
                                    <td>Biaya pajak</td>
                                    <td><center>  0 IDR</center></td>
                                </tr>
                                <tr>
                                    <td>Biaya ongkir</td>
                                    @if ($bill[0]->shipping_company == 'ambilSendiri')
                                    <td><center>  0 IDR</center></td>
                                    @else
                                    <td><center>  xxx IDR</center></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Total </td>
                                    <td><span><center> 
                                        {{ $bill[0]->total }}
                                    IDR</center></span></td>
                                </tr>
                                <tr>
                                    <td>Status </td>
                                    @if ($bill[0]->payment_status == 0)
                                    <td style="background-color: red; border-radius: 10px; padding: 5px; margin-botton: -30px"><center>Sedang menunggu konfirmasi admin</center></td>
                                    @endif
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
                @endif
            </table>
        </div>
        <div class="payment-options" style="float: right ">
            {{--  @if($bill[0]->shipping_cost == -1 && $bill[0]->shipping_company != '')
            {{ $bill[0]->total }}
            @endif  --}}
            @if ($bill->count() > 0)
                
                @if ($bill[0]->payment_status == 1)    
                <a href="/payment"> => Pergi ke Pembayaran</a>
                @endif

            @endif
        </div>
    </div>
</section> <!--/#cart_items-->


@endsection