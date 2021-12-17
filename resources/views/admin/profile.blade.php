@extends('admin.main')

@section('content')
        
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">My Profile</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         
        <div class="card" style="width: 25rem;">
            {{--  <div class="card-body">
              <h5 class="card-subtitle mb-2 text-muted"> Store Name : {{ $data->nama }} </h5>
              <p class="card-text">No Telp : {{ $data->no_telp }}</p>
              <p class="card-text">Email : {{ $data->email }}</p>
              <p class="card-text">Password : {{ $data->password }}</p>
              <p class="card-text">Sosial Media </p>
              <ul>
                  <li><p class="card-text">Whatsapp : {{ $data->whatsapp }}</p></li>
                  <li><p class="card-text">Instagram : {{ $data->instagram }}</p></li>
                  <li><p class="card-text">Telegram : {{ $data->telegram }}</p></li>
                  <li><p class="card-text">Line : {{ $data->line }}</li>
                    <li><p class="card-text">Facebook : {{ $data->facebook }}</p></li>
                </ul> 
              <p class="card-text">Alamat : {{ $data->alamat }}</p>
            </div>  --}}
            <div class="card-body">
              <h5 class="card-subtitle mb-2 text-muted"> Store Name : Portio.id </h5>
              <p class="card-text">No Telp : +6285836487634</p>
              <p class="card-text">Email : jefry049usu@gmail.com</p>
              <p class="card-text">Sosial Media </p>
              <ul>
                  <li><p class="card-text">Whatsapp : </p></li>
                  <li><p class="card-text">Instagram : </p></li>
                </ul> 
              <p class="card-text">Alamat : Jln.Asia No.6 Komplek Asia Mega Mas</p>
            </div>
        </div>

        <div style="margin-right:30px" class="btn bg-info text-dark" data-bs-toggle="modal" data-bs-target="#myModal">
          Ubah Profil Toko 
        </div>

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Edit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="col-sm-10 bordered" method="post" action="/admin/editProfile">
            @csrf
            <div class="form-group row">
              <label for="nama" class="col-sm-4 col-form-label">Store Name </label>
              <div class="col-sm-10 mt-2">
                <input type="name" name="name" class="form-control" id="name" placeholder="Nama Supplier" value="">
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-4 col-form-label">Email </label>
              <div class="col-sm-10">
                <input type="name" name="email" class="form-control" id="email" placeholder="jefry@gmail.com" value="">
              </div>
            </div>
            <div class="form-group row">
              <label for="username" class="col-sm-4 col-form-label">Username </label>
              <div class="col-sm-10">
                <input type="name" name="username" class="form-control" id="username" placeholder="jefry@gmail.com" value="">
              </div>
            </div>
            <div class="form-group row">
              <label for="no_telp" class="col-sm-4 col-form-label">No Telp </label>
              <div class="col-sm-10">
                <input type="name" name="phone_number" class="form-control" id="no_telp" placeholder=" +6281378752888 " value="">
              </div>
            </div>
            <div class="form-group row">
              <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
              <div class="col-sm-10 mt-4">
                <input type="name" name="address" class="form-control" id="alamat" placeholder="Jln. Asia No.68 Medan , Sumatera Utara" value="">
              </div> 
            </div>
            <div class="form-group row">
              <div class="col-sm-8">
                <button type="submit" class="btn btn-primary">Ubah Profil Toko</button>
              </div>
            </div>
        </form>
        </div>
        
      </div>
    </div>
  </div>

@endsection