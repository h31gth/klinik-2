@extends('landingpage.layouts.main')
@section('content')

<section class="py-xxl-10 pb-0" id="home">
    <div class="bg-holder bg-size" style="background-image:url({!! asset('assets/img/gallery/hero-bg.png') !!});background-position:top center;background-size:cover;">
    </div>
    <!--/.bg-holder-->

    <div class="container-fluid">
      <div class="card shadow mb-4">
          <div class="card-header pt-3">
              <h1 class="h3 text-gray-800">Antrian</h1>
          </div>
          @if ($message = Session::get('success'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
          @endif
          <div class="card-body">
              @if ($data->count())
              <div class="table-responsive">
                  <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th class="text-center">No</th>
                              <th class="text-center">Poliklinik</th>
                              <th class="text-center">Nama Dokter</th>
                              <th class="text-center">No Antrian</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($data as $item)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $item->nama_poli }}</td>
                              <td>{{ $item->dokter }}</td>
                              <td>{{ $item->no_antrian }}</td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
          @else
          <h1>Belum Ada Antrian</h1>
          @endif
      </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <!-- Page level plugins -->
      <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
      <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
      <script>
$(document).ready(function () {
    $('#dataTable').DataTable();
});
    </script>
@endsection