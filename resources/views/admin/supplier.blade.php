@extends('admin.main')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Supplier List</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Tambah Supplier
            </button>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Supplier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="col-sm-10 bordered" method="post" action="/admin/addSupplier">
          @csrf
          <div class="form-group row">
            <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap </label>
            <div class="col-sm-10 mt-2">
              <input type="name" name="name" class="form-control" id="name" placeholder="Nama Supplier">
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label">Email </label>
            <div class="col-sm-10">
              <input type="name" name="email" class="form-control" id="email" placeholder="jefry@gmail.com">
            </div>
          </div>
          <div class="form-group row">
            <label for="whatsapp" class="col-sm-4 col-form-label">Whatsapp </label>
            <div class="col-sm-10 mt-4">
              <input type="name" name="whatsapp" class="form-control" id="whatsapp" placeholder=" No Whatsapp">
            </div> 
          </div>
          <div class="form-group row">
            <label for="instagram" class="col-sm-4 col-form-label">Instagram</label>
            <div class="col-sm-10 mt-4">
              <input type="name" name="instagram" class="form-control" id="instagram" placeholder="ex: @j.e.f.r.y">
            </div> 
          </div>
          <div class="form-group row">
            <label for="facebook" class="col-sm-4 col-form-label">Facebook</label>
            <div class="col-sm-10 mt-4">
              <input type="name" name="facebook" class="form-control" id="facebook" placeholder="Username Facebook">
            </div> 
          </div>
          <div class="form-group row">
            <label for="telegram" class="col-sm-4 col-form-label">Telegram</label>
            <div class="col-sm-10 mt-4">
              <input type="name" name="telegram" class="form-control" id="telegram" placeholder=" +6281378752888 ">
            </div> 
          </div>
          <div class="form-group row">
            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
            <div class="col-sm-10 mt-4">
              <input type="name" name="address" class="form-control" id="alamat" placeholder="Jln. Asia No.68 Medan , Sumatera Utara">
            </div> 
          </div>
          <div class="form-group row">
            <div class="col-sm-8">
              <button type="submit" class="btn btn-primary">Tambah Supplier</button>
            </div>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>
        
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         
        <table class="table table-bordered table-sm">
            <thead class="bg-success">
              <tr>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Sosial Media</th>
                <th>Produk</th>
                <th>Alamat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="bg-light">
              @foreach ($suppliers as $supplier)
                <tr>
                  <td>{{ $supplier->name }}</td>
                  <td>{{ $supplier->email }}</td>
                  <td>
                      <ul>
                          <li> Whatsapp : {{ $supplier->whatsapp }}</li>
                          <li> Instagram : {{ $supplier->instagram }}</li>
                          <li> Facebook : {{ $supplier->facebook }}</li>
                          <li> Telegram : {{ $supplier->telegram }}</li>
                      </ul>
                  </td>
                  <td>
                      <ul>
                        @foreach ($products as $product)
                          @if($product->supplier_id == $supplier->id)
                            <li> {{ $product->name }}</li>
                          @endif
                        @endforeach
                      </ul>
                  </td>
                  <td> {{ $supplier->address }}</td>
                  <td>
                    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#UbahModal{{ $supplier->id }}">
                      Ubah Supplier
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          @foreach ($suppliers as $supplier)
          <div class="modal fade" id="UbahModal{{ $supplier->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Form Ubah Supplier</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="col-sm-10 bordered" method="post" action="/admin/ubahSupplier">
                    @csrf
                    <input type="hidden" name="id" value="{{ $supplier->id }}">
                    <div class="form-group row">
                      <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap </label>
                      <div class="col-sm-10 mt-2">
                        <input type="name" name="name" class="form-control" id="name" value="{{ $supplier->name }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-sm-4 col-form-label">Email </label>
                      <div class="col-sm-10">
                        <input type="name" name="email" class="form-control" id="email" value="{{ $supplier->email }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="whatsapp" class="col-sm-4 col-form-label">Whatsapp </label>
                      <div class="col-sm-10 mt-4">
                        <input type="name" name="whatsapp" class="form-control" id="whatsapp" value="{{ $supplier->whatsapp }}">
                      </div> 
                    </div>
                    <div class="form-group row">
                      <label for="instagram" class="col-sm-4 col-form-label">Instagram</label>
                      <div class="col-sm-10 mt-4">
                        <input type="name" name="instagram" class="form-control" id="instagram"value="{{ $supplier->instagram }}">
                      </div> 
                    </div>
                    <div class="form-group row">
                      <label for="facebook" class="col-sm-4 col-form-label">Facebook</label>
                      <div class="col-sm-10 mt-4">
                        <input type="name" name="facebook" class="form-control" id="facebook" value="{{ $supplier->facebook }}">
                      </div> 
                    </div>
                    <div class="form-group row">
                      <label for="telegram" class="col-sm-4 col-form-label">Telegram</label>
                      <div class="col-sm-10 mt-4">
                        <input type="name" name="telegram" class="form-control" id="telegram" value="{{ $supplier->telegram }}">
                      </div> 
                    </div>
                    <div class="form-group row">
                      <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                      <div class="col-sm-10 mt-4">
                        <input type="name" name="address" class="form-control" id="alamat" value="{{ $supplier->address }}">
                      </div> 
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary">Ubah Supplier</button>
                      </div>
                    </div>
                </form>
                </div>
              </div>
            </div>
          </div>
          @endforeach

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  

@endsection