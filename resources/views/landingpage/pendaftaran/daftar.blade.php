@extends('landingpage.layouts.main')
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@section('content')

<section class="py-xxl-10 pb-0" id="home">
    <div class="bg-holder bg-size"
      style="background-image:url({!! asset('assets/img/gallery/hero-bg.png') !!});background-position:top center;background-size:cover;">
    </div>
    <!--/.bg-holder-->

    <div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header pt-3">
            <h1 class="h3 text-gray-800">Pendaftaran</h1>
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
                            <th class="text-center">Tanggal Pendaftaran</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->poli }}</td>
                            <td>{{ $item->dokter }}</td>
                            <td>{{ $item->no_antrian }}</td>
                            <td>{{ $item->tgl_pendaftaran }}</td>
                            <td><span class="{{ ($item->status == 'Terdaftar') ? 'badge bg-info rounded-pill text-light' : 'badge bg-success rounded-pill text-light' }}">{{ $item->status }}</span></td>
                            <td>
                                <a class="btn btn-info rounded-pill btn-sm me-2" href="{{ url('landingpage/pendaftaran/show/'.$item->id) }}">Detail</a>
                                @if($item->status == 'Selesai')
                                    <div class="btn btn-success rounded-pill btn-sm">Sudah Selesai</div>
                                @else
                                <a href="#" class="btn btn-danger rounded-pill btn-sm circle modal-delete" data-id="{{ $item->id  }}" data-judul="{{ $item->no_antrian }}">Batalkan</a>
                                  @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <h1>Belum Ada Pendaftaran</h1>
        @endif
        <hr>
        <div class="d-flex justify-content-center mb-3">
            <a class="btn btn-primary rounded-pill" href="{{ url('landingpage/pendaftaran/create') }}">Tambah Pendaftaran</a>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Page level plugins -->
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
      $('.modal-delete').click( function(){
                  var judulid = $(this).attr('data-id');
                  var judul_data = $(this).attr('data-judul');
                  swal({
                      title: "Yakin?",
                      text: "Anda Akan Membatalkan Pendaftaran Pada Antrian ke - "+judul_data+"",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                      })
                      .then((willDelete) => {
                      if (willDelete) {
                          window.location = "/landingpage/pendaftaran/"+judulid
                      } else {
                          swal("Data Tidak Jadi dihapus");
                      }
                      });
              })                         
          </script>
    <script>
$(document).ready(function () {
  $('#dataTable').DataTable();
});
  </script>
    <script>
        @if(Session::has('message'))
      swal({
        title: "Success",
        text: "{{ session('message') }}",
        icon: "success",
      });
      @endif
    </script>
@endsection