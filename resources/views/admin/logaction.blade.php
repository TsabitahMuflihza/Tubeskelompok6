@extends('admin.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Aktivitas Konfirmasi Admin</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         
        <table class="table ">
            <thead class="bg-warning">
              <tr>
                <th>History</th>
                <th>Waktu</th>
              </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($notif_actions as $log)    
                <tr>
                  <td>{{ $log->keterangan }}</td>
                  <td>{{ $log->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
       
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>


@endsection
