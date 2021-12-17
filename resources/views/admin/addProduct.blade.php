@extends('admin.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Product</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         
        <form class="col-sm-6 bordered" method="POST" action="/admin/addproduct">
          @csrf
            <div class="form-group row">
              <label for="nama_produk" class="col-sm-2 col-form-label" >Nama Produk  </label>
              <div class="col-sm-10 mt-2">
                <input type="name" class="form-control" id="nama_produk" name="name">        
                @error('name')
                    <div class="invalid_feedback text-danger"> {{$message}}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="stock" class="col-sm-2 col-form-label" >Stock </label>
              <div class="col-sm-10">
                <input type="numeric" class="form-control" id="stock" name="stock">
                @error('stock')
                    <div class="invalid_feedback text-danger"> {{$message}}</div>
                @enderror
                <small id="stock" class="form-text text-muted">
                    Harap memasukkan kuantitas tanpa tanda baca , ex : 38000
                </small>
              </div>
            </div>
            <div class="form-group row">
              <label for="harga" class="col-sm-2 col-form-label" >Harga </label>
              <div class="col-sm-10">
                <input type="numeric" class="form-control" id="harga" name="price">
                @error('price')
                    <div class="invalid_feedback text-danger"> {{$message}}</div>
                @enderror
                <small id="harga" class="form-text text-muted">
                  Harap memasukkan harga tanpa tanda baca , ex : 38000
                </small>
              </div>
            </div>
            <div class="form-group row">
              <label for="gambar" class="col-sm-2 col-form-label" >Nama Gambar Produk </label>
              <div class="col-sm-10 mt-4">
                <input type="name" class="form-control" id="gambar" name="image">
                @error('image')
                    <div class="invalid_feedback text-danger"> {{$message}}</div>
                @enderror
                <small id="passwordHelpBlock" class="form-text text-muted">
                      Pastikan Gambar sudah terletak di Path yang tepat
                </small>
              </div> 
            </div>
            <div class="form-group row">
              <label for="info_barang" class="col-sm-2 col-form-label" name="info"> Info Produk </label>
              <div class="col-sm-10 mt-4">
                <textarea class="form-control" rows="5" id="comment" name="info"></textarea>
              </div>
            </div>
            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Kategori </legend>
                <div class="col-sm-10">
                  @foreach ($categories as $categori)
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="categori_id" id="categori" value="{{ $categori->id }}" >
                    <label class="form-check-label" for="categori">
                      {{ $categori->name }}
                    </label>
                  </div>
                  @endforeach
                  <button type="button" class="btn btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#ModalCategori">
                    Tambah Kategori
                  </button>
                  @error('categori_id')
                    <div class="invalid_feedback text-danger"> Kategori harus diisi</div>
                  @enderror
                </div>
              </div>
            </fieldset>
            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Brand </legend>
                <div class="col-sm-10">
                  @foreach ($brands as $brand)
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="brand_id" id="brand" value="{{ $brand->id }}" >
                    <label class="form-check-label" for="brand">
                      {{ $brand->name }}
                    </label>
                  </div>
                  @endforeach
                  <button type="button" class="btn btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#ModalBrand">
                    Tambah Brand
                  </button>
                  @error('brand_id')
                    <div class="invalid_feedback text-danger"> Brand harus diisi</div>
                  @enderror
                </div>
              </div>
            </fieldset>
            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Supplier </legend>
                <div class="col-sm-10">
                  @foreach ($suppliers as $supplier)
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="supplier_id" id="supplier" value="{{ $supplier->id }}" >
                    <label class="form-check-label" for="supplier">
                      {{ $supplier->name }}
                    </label>
                  </div>
                  @endforeach
                  <button type="button" class="btn btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#add">
                    Tambah Supplier
                  </button>
                  @error('supplier_id')
                    <div class="invalid_feedback text-danger"> Supplier harus diisi </div>
                  @enderror
                </div>
              </div>
            </fieldset>
            <div class="form-group row">
              <div class="col-sm-4">
                <button type="submit" class="btn btn-primary">Tambah Product</button>
              </div>
            </div>
        </form>

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- Modal -->
<div class="modal fade" id="ModalBrand" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Brand</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="col-sm-10 bordered" method="post" action="/addBrand">
          @csrf
          <div class="form-group row">
            <label for="nama" class="col-sm-4 col-form-label">Nama Brand </label>
            <div class="col-sm-10 mt-2">
              <input type="name" name="name" class="form-control" id="name" placeholder="Nama Brand">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-8">
              <button type="submit" class="btn btn-primary">Tambah Brand</button>
            </div>
          </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        {{--  <button type="button" class="btn btn-primary">Save changes</button>  --}}
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ModalCategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="col-sm-10 bordered" method="post" action="/addCategori">
          @csrf
          <div class="form-group row">
            <label for="nama" class="col-sm-4 col-form-label">Nama Kategori </label>
            <div class="col-sm-10 mt-2">
              <input type="name" name="name" class="form-control" id="name" placeholder="Nama Kategori">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-8">
              <button type="submit" class="btn btn-primary">Tambah Categori</button>
            </div>  
          </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        {{--  <button type="button" class="btn btn-primary">Save changes</button>  --}}
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

@endsection
