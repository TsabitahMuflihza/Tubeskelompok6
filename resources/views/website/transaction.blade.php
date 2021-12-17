@extends ('layout.main')

@section ('konten')

<section id="cart_items">
    <div class="container">
        
        @include('sweetalert::alert')

        @foreach ($bills as $bill)
        <div class="table-responsive cart_info" style="width: 70%">
            {{--  @if( $bill->payment_status == 0)
            <p ><center style="background-color: rgb(49, 49, 49); font-size: 20px; margin-bottom: -10px; color:rgb(186, 181, 196)">Status : Menunggu Konfirmasi</center></p>
            @elseif( $bill->payment_status == 1)
            <p ><center style="background-color: green; font-size: 20px; margin-bottom: -10px; color:rgb(186, 181, 196) ">Status : Lunas</center></p>
            @elseif( $bill->payment_status == 2)
            <p ><center style="background-color: rgb(138, 36, 36); font-size: 20px; margin-bottom: -10px; color:rgb(186, 181, 196)">Status : Menunggu Pembayaran</center></p>
            @else   
            <p ><center style="background-color: rgb(138, 36, 36); font-size: 20px; margin-bottom: -10px; color:rgb(186, 181, 196)">Status : Ditolak</center></p>
            @endif  --}}
            <table class="table table-condensed" >
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
                    @foreach ($checkouts as $checkout )
                    @if ($bill->id == $checkout->bill_id)                  
                    <tr>
                        <td class="cart_product">
                            <a href=""><img style="margin-left: -40px font-size: 20px" width="60px" src="/images/product/{{$checkout->product->image}}" alt=""></a>
                        </td>
                        <td class="cart_quantity" style=" font-size: 10px; margin-left:20px">
                            <h5><a href="">{{ $checkout->product->name }}</a></h5>
                            <p>Brand: {{ $checkout->product->brand->name }}</p>
                        </td>
                        <td class="cart_quantity" style=" font-size: 10px">
                            <p>{{ $checkout->product->price }} IDR</p>
                        </td>
                        <td class="cart_quantity" style=" font-size: 10px">                            
                            <p>{{ $checkout->quantity }} unit</p>
                        </td>
                        <td class="cart_quantity" style=" font-size: 10px">
                            <p class="cart_total_price"> {{ $checkout->product->price * $checkout->quantity }}</p>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Total Belanjaan</td>
                                    <td><center>{{ $bill->total }} IDR</center></td>
                                </tr>
                                <tr>
                                    <td>Biaya pajak</td>
                                    <td><center>0</center></td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td><center>
                                    @if ($bill->payment_status != 0)
                                        {{ $bill->shipping_cost }} 
                                    @else
                                        xxx
                                    @endif
                                    IDR
                                    </center></td>										
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><center><span>{{ $bill->total }} IDR</span></center></td>
                                </tr>
                                <tr>
                                    <td>Status </td>
                                    @if ($bill->payment_status == 0)
                                    <td style="background-color: rgb(83, 80, 80); border-radius: 10px; padding: 5px; margin-botton: -30px; color: white"><center>Menunggu konfirmasi admin</center></td>
                                    @elseif ($bill->payment_status == 1)
                                    <td style="background-color: rgb(163, 91, 8); border-radius: 10px; padding: 5px; margin-botton: -30px; color: white"><center>Menunggu pembayaran</center></td>
                                    @elseif ($bill->product_status == 1)
                                    <td style="background-color: rgb(16, 137, 185); border-radius: 10px; padding: 5px; margin-botton: -30px; color: white"><center>Barang sedang pengiriman</center></td>
                                    @elseif ($bill->product_status == 2)
                                    <td style="background-color: rgb(11, 150, 34); border-radius: 10px; padding: 5px; margin-botton: -30px; color: white"><center>Barang sudah diterima</center></td>
                                    @elseif ($bill->payment_status == 2)
                                    <td style="background-color: rgb(147, 179, 31); border-radius: 10px; padding: 5px; margin-botton: -30px; color: white"><center>Menunggu pengecekan pembayaran</center></td>
                                    @else
                                    <td style="background-color: rgba(236, 11, 11, 0.945); border-radius: 10px; padding: 5px; margin-bottom: 30px; color: white"><center>Batal</center></td>
                                    @endif
                                </tr>
                                @if ($bill->product_status == 1)    
                                <tr style="margin-bottom: -30px;">
                                    <td style="margin-bottom: -30px;"></td>
                                    <td style="background-color: rgba(175, 163, 163, 0.945); border-radius: 10px; padding: 5px;  color: rgb(26, 23, 23);"><center><a href="/productAccepted">Barang sudah diterima</a></center></td>
                                </tr>
                                @endif
                            </table>
                        </td>
                    </tr>
                    @if ($bill->product_status == 1)
                    <tr>
                        <td>
                            <div style="margin-left: 20px;">
                                <p ><center style="background-color: rgb(128, 122, 122); font-size: 20px; margin-bottom: -10px; 
                                    color:rgb(27, 26, 27)">Barang sedang proses pengiriman!</center></p>
    
                                <form style="margin-top: 20px" method="post" action="/productAccepted">
                                    @csrf
                                    <input type="hidden" name="product_status" value="2">
                                    <input type="hidden" name="id" value="{{ $bill->id}}">
                                    <button type="submit" onclick="swal("Hello world!", 'latihan', 'success');">Barang telah diterima</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td></td>
                        <td>
                            @if ($bill->count() > 0)
                
                                @if ($bill->payment_status == 1)    
                                <a href="/payment/{{ $bill->id }}"> => Pergi ke Pembayaran</a>
                                @endif


                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endforeach
        
    </div>
</section> <!--/#cart_items-->


@endsection