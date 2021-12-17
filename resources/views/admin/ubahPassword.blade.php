@extends('admin.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ubah Password</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         
        <form class="col-sm-6 bordered" method="POST" action="/admin/ubahPassword">
          @csrf
            <div class="form-group row">
              <label for="nama_produk" class="col-sm-2 col-form-label" >New Password </label>
              <div class="col-sm-10 mt-2">
                <input type="password" class="form-control" id="nama_produk" name="password">
                @error('password')
                  <div class="invalid_feedback text-danger"> {{$message}}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="stock" class="col-sm-2 col-form-label"> Konfirmasi Password </label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="stock" name="password_confirmation">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-4">
                <button type="submit" class="btn btn-primary">Ubah Password</button>
              </div>
            </div>
        </form>

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>


@endsection
