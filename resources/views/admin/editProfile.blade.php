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
         
              <div class="container">
                 <img style="width:200px; border-radius: 50%" src="/images/product/Brow wiz.jpg" >
                  <div class="card-body">
                  <p class="card-title">Nama : {{ $user->name }}</p>
                  <p class="card-text">Username  : {{ $user->username }}</p>
                  <p class="card-text">Email : {{ $user->email  }}</p>
                  <p class="card-text">Nomor Handphone : {{ $user->phone_number }}</p>
                  <p class="card-text">Alamat : {{ $user->address  }}</p>

                        <div style="margin-right:30px"class="btn bg-info text-dark" data-bs-toggle="modal" data-bs-target="#myModal">
                            <span>Ubah Profile</span>  
                        </div>

                        <div class="btn bg-warning"><a style="text-decoration: none" href="/admin/ubahPassword">Ubah Password</a></div>
                </div>
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
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Supplier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="col-sm-10 bordered" method="post" action="/admin/editProfile">
          @csrf
          <div class="form-group row">
            <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap </label>
            <div class="col-sm-10 mt-2">
              <input type="name" name="name" class="form-control" id="name" placeholder="Nama Supplier" value="{{ $user->name }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label">Email </label>
            <div class="col-sm-10">
              <input type="name" name="email" class="form-control" id="email" placeholder="jefry@gmail.com" value="{{ $user->email }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="username" class="col-sm-4 col-form-label">Username </label>
            <div class="col-sm-10">
              <input type="name" name="username" class="form-control" id="username" placeholder="jefry@gmail.com" value="{{ $user->username }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="no_telp" class="col-sm-4 col-form-label">No Telp </label>
            <div class="col-sm-10">
              <input type="name" name="phone_number" class="form-control" id="no_telp" placeholder=" +6281378752888 " value="{{ $user->phone_number }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
            <div class="col-sm-10 mt-4">
              <input type="name" name="address" class="form-control" id="alamat" placeholder="Jln. Asia No.68 Medan , Sumatera Utara" value="{{ $user->address }}">
            </div> 
          </div>
          <div class="form-group row">
            <div class="col-sm-8">
              <button type="submit" class="btn btn-primary">Ubah Profil</button>
            </div>
          </div>
      </form>
      </div>
      
    </div>
  </div>
</div>
             

@endsection