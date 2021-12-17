@extends('admin.main')

@section('content')
        
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Customer List</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         
        <table class="table table-bordered table-sm text-center">
            <thead class="bg-warning">
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Nama lengkap</th>
                <th>No Telp</th>
                <th>Alamat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="bg-light">
              <?php $i = 1; ?>
              @foreach ($users as $user)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $user->username }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->phone_number }}</td>
                  <td>{{ $user->address }} </td>
                  <td class="float-between">
                      <span class="btn bg-success"><a style="text-decoration:none" href="/admin/historyTransaction/{{ $user->id }}"> Riwayat Transaksi</a></span>
                      @if($user->active == 1)
                      <div class="btn bg-danger"><a style="text-decoration:none" href="/admin/deleteCustomer/{{ $user->id }}">&nbsp Hapus  &nbsp</a></div>
                      @else
                      <div class="btn bg-info"><a  style="text-decoration:none" href="/admin/restoreCustomer/{{ $user->id }}">Pulihkan</a></div>
                      @endif
                      @if($user->role == 'customer')
                      <div class="btn bg-info"><a  style="text-decoration:none" href="/admin/makeadmin/{{ $user->id }}">Ubah jadi Admin</a></div>
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