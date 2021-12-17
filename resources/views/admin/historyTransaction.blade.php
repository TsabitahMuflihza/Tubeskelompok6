@extends('admin.main')

@section('content')
        
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Transaction List</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        @if (session('confirm'))
        <div class="alert alert-success text-dark">
          {{ session('confirm') }}
        </div>
        @endif
         
        <table class="table table-bordered table-sm">
            <thead class="bg-success">
              <tr>
                <th>Nama Pembeli</th>
                <th>Daftar Belanja</th>
                <th>Total</th>
                <th>Alamat Pengiriman</th>
                {{--  <th>Review</th>  --}}
                {{--  <th>Status Pembayaran</th>  --}}
                {{--  <th>Status Pengiriman</th> <!-- Barang telah diterima oleh pembeli atau belum -->  --}}
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="bg-light" style="font-size: 12px">
              @foreach ($bills as $bill)
              <tr>
                  <td> {{ $bill->user->name }}
                    <p style="margin-bottom: -20px">
                      Catatan Pembeli :
                      {{ $bill->customer_note }}
                    </p>
                  </td>
                  <td>
                    <ul>
                        @foreach ($checkouts as $checkout)  
                          @if ($checkout->bill_id == $bill->id)
                            <li class="mb-2" > 
                              <img src="/images/product/{{$checkout->product->image}}" width="40px" alt=""/>
                              {{ $checkout->product->name }} : {{ $checkout->quantity }} Unit
                            </li>
                          @endif
                        @endforeach
                      </ul>
                  </td>
                  <td> {{ $bill->total }} IDR
                    <p> Status : 
                      @if( $bill->payment_status == 0)               
                      <span class="badge bg-secondary">Belum konfirmasi</span> 
                      @elseif( $bill->payment_status == 1)                  
                      <span class="badge bg-warning">Belum Dibayar</span> 
                      @elseif( $bill->payment_status == 2)
                      <span class="badge bg-success">Lunas</span> 
                        @if ($bill->product_status < 0)
                        <span class="badge bg-warning">Belum dikonfirmasi admin</span> 
                        @else
                        <span class="badge bg-success">Sudah dikonfirmasi admin</span> 
                        @endif
                      @else                  
                      <span class="badge bg-danger">Ditolak</span> 
                      @endif
                    </p>
                    <p>
                      Via Pembayaran : 
                      Transfer Bank
                    </p>
                  </td>
                  <td>Alamat :  {{ $bill->adress }}
                    <p>Status : 
                      @if( $bill->product_status == 0)
                      <span class="badge bg-secondary">Proses</span> 
                      @elseif( $bill->product_status == 1)
                      <span class="badge bg-primary">Dikirim</span> 
                      @elseif( $bill->product_status == 2)
                      <span class="badge bg-success">Sukses</span> 
                      @else
                      <span class="badge bg-danger">Batal</span> 
                      @endif
                    </p>
                    <p> Pengiriman melalui :
                      {{ $bill->shipping_company }}
                    </p>
                  </td>
                  <td>
                    @if ($bill->product_status == 2)
                    <span  class="badge bg-primary">Pesanan sudah selesai</span>
                    @elseif ($bill->payment_status == 3)
                      <span class="badge bg-danger">Pesanan telah ditolak</span>  
                    @else
                      @if( $bill->payment_status == 0)
                      <span  class="badge bg-primary"><a href="/admin/transaction/confirmation/{{ $bill->id }}">Konfirmasi</a> </span>
                      <span class="badge bg-danger"><a href="/admin/transaction/reject/{{ $bill->id }}">Tolak</a></span>
                      @elseif ($bill->payment_status == 2 && $bill->product_status < 0 )
                      <span class="badge bg-warning"><a href="/admin/confirmPayment/{{ $bill->id }}">Tandai Pesanan sudah dibayar</a></span>
                      @elseif($bill->payment_status == 2 && $bill->product_status == 0)
                      <span class="badge bg-success"><a href="/admin/send/{{ $bill->id }}">Tandai Pesanan sudah dikirim</a></span>
                      @elseif($bill->payment_status == 2 && $bill->product_status == 1)
                      <span class="badge bg-success"><a href="/admin/clear/{{ $bill->id }}">Tandai Pesanan sudah selesai</a></span>
                      
                      @endif
                    @endif    
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection