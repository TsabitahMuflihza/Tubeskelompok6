@extends('admin/main')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">

          {{--  <div class="mb-4">
            <form action="/admin/filter/dashboard" method="post">
              <label for=""></label>
              <input type="text" name="from" placeholder="dd-mm-yy">
              <label for=""> : </label>
              <input type="text" name="until" placeholder="dd-mm-yy">
              <button type="submit" class="btn-sm btn-primary">Filter</button>
            </form>
          </div>  --}}

          <div class="col-12 col-sm-6 col-md-3" style="float: right">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Transaction Active</span>
                <span class="info-box-number">
                  {{ $transactions->count() }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
              <?php $revenue = 0; ?>
              @foreach ($solds as $sold)
                <?php $revenue += $sold->price * $sold->sold ?>
              @endforeach

              <div class="info-box-content">
                <span class="info-box-text">Product</span>
                <span class="info-box-number">{{ $products->count() }} Unit</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Revenue</span>
                <span class="info-box-number">{{ $revenue }} IDR</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Customers</span>
                <span class="info-box-number">{{ $customers->count() }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- /.card -->
            <div class="row">
              <div class="col-md-6">
                
                  <!-- /.card-footer-->
                </div>  
                <!--/.direct-chat -->
              </div>
              <!-- /.col -->

              
      
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Username</th>
                      <th>Tanggal Pemesanan</th>
                      <th>Status</th>
                      <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($transactions as $bill)  
                    <tr>
                      <td>{{ $bill->user->username }}</td>
                      <td>{{ $bill->created_at }}</td>
                      <td>
                      @if( $bill->product_status == 0)
                      <span class="badge badge-secondary">Proses</span> 
                      @elseif( $bill->product_status == -1)
                      <span class="badge badge-warning">Belum dikonfirmasi</span> 
                      @elseif( $bill->product_status == 1)
                      <span class="badge badge-primary">Dikirim</span> 
                      @elseif( $bill->product_status == 2)
                      <span class="badge badge-success">Sukses</span> 
                      @else
                      <span class="badge badge-danger">Batal</span> 
                      @endif
                      </td>
                      <td>
                        <div class="sparkbar" data-color="#f39c12" data-height="20">{{ $bill->total }}</div>
                      </td>
                    </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="/admin/transaction" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          

@endsection
