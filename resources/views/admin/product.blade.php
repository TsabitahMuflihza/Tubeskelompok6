@extends('admin.main')

@section('content')
        
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Produk</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        @if (session('status'))
        <div class="alert alert-success text-dark">
          {{ session('status') }}
        </div>
        @endif
         
        <table class="table table-bordered table-sm text-center">
            <thead class="bg-secondary">
              <tr>
                <th>Nama Product</th>
                <th>Gambar</th>
                <th>Harga</th>
                <th>Stock</th>
                <th>Kategori</th>
                <th>Brand</th> 
                <th>Diskon</th> 
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="bg-light">
              @foreach ($products as $product)  
              <tr class="">
                <td>{{ $product->name }}</td>
                <td>
                    <img src="/images/product/{{  $product->image  }}" width="50px" height="60px" "alt=""/>
                </td>
                <td> {{ $product->price }} IDR</td>
                <td> {{ $product->stock }}  </td>
                <td> {{ $product->categori->name}} </td>
                <td> {{ $product->brand->name }} </td>
                <td> {{ $product->discount }} % </td>
                <td class="text-center">
                    <div class="btn bg-info text-dark" data-bs-toggle="modal" data-bs-target="#myModal{{ $product->id }}">
                      <span>add stock</span>  
                    </div>
                      @if($product->active == 1)
                      <span class="btn bg-danger"><a style="text-decoration:none" href="/admin/deleteProduct/{{ $product->id }}">&nbsp Hapus  &nbsp</a></span>
                      @else
                      <span class="btn bg-warning"><a  style="text-decoration:none" href="/admin/restoreProduct/{{ $product->id }}">Pulihkan</a></span>
                      @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          <ul class="pagination no-margin mt-4">
            {{ $products->links("pagination::bootstrap-4") }}
          </ul>

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  
  @foreach ($products as $product) 
  <div class="modal fade" id="myModal{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="width:300px">
        <div class="modal-header">
          <h4>Tambah Kuantitas</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card center" style="width:250px">
            <img class="card-img-top" width="50%" height="200px" src="/images/product/{{  $product->image  }}" alt="Card image">
            <div class="card-body">
              <p>{{ $product->name }}</p>
            </div>
          </div>
          <form class="col-sm-10 bordered" method="post" action="/admin/addStock">
            @csrf
            <label for="stock" class="col-sm-2 col-form-label" >Kuantitas </label>
              <div class="col-sm-10">
                <input type="numeric" class="form-control" id="stock" name="stock">
                <input type="hidden" class="form-control" id="stock" name="id" value="{{ $product->id }}">
                <small id="stock" class="form-text text-muted">
                    Harap memasukkan kuantitas tanpa tanda baca , ex : 38000
                </small>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
      </div>
    </div>
  </div>
  @endforeach

@endsection