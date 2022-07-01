@extends('admin.layouts.main')
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Pendaftaran</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-between">
            <div class="col-lg-10">
                <a class="btn btn-primary" href="{{ url('admin/pendaftaran/create') }}">Tambah Pendaftaran</a>
            </div>
            <div class="col-lg-1">
                <a class="btn btn-danger" href="{{ url('admin/pendaftaran/create') }}">PDF</a>
            </div>
            <div class="col-lg-1">
                <a class="btn btn-success" href="{{ url('admin/pendaftaran/create') }}">Excel</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Nama Dokter</th>
                        <th>No Antrian</th>
                        <th>Tanggal Pendaftaran</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->pasien }}</td>
                        <td>{{ $item->dokter }}</td>
                        <td>{{ $item->no_antrian }}</td>
                        <td>{{ $item->tgl_pendaftaran }}</td>
                        <td><div class="{{ ($item->status == 'Terdaftar') ? 'badge bg-info text-light' : 'badge bg-success text-light' }}">{{ $item->status }}</div></td>
                        <td>
                              @if($item->status == 'Selesai')
                              <div class="btn btn-success btn-sm border-0">Sudah Selesai</div>
                              @else
                              <form method="POST" class="d-inline" action="{{ url('admin/pendaftaran/'.$item->id) }}">
                                @csrf
                                <input name="_method" type="hidden" value="PUT">
                                <button type="submit" class="btn btn-sm btn-success border-0 edit_confirm" data-toggle="tooltip" title='Delete'>Selesai</button>
                            </form>
                              <form method="POST" class="d-inline" action="{{ url('admin/pendaftaran/'.$item->id) }}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-sm btn-danger border-0 show_confirm" data-toggle="tooltip" title='Delete'>Batalkan</button>
                            </form>
                              @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<script>
    $('.edit_confirm').click(function(event) {
         var form =  $(this).closest("form");
         var name = $(this).data("name");
         event.preventDefault();
         swal({
             title: "Apakah Anda Yakin Pendaftaran Selesai ? ",
             text: "Jika Selesai Data Akan Berubah",
             icon: "info",
             buttons: true,
             dangerMode: true,
         })
         .then((willDelete) => {
           if (willDelete) {
             form.submit();
           }else{
               swal("Data Tetap Terdaftar");
           }
         });
     });                        
   </script>
<script>
    $('.show_confirm').click(function(event) {
         var form =  $(this).closest("form");
         var name = $(this).data("name");
         event.preventDefault();
         swal({
             title: "Apakah Anda Yakin Akan Hapus Data ? ",
             text: "Jika Dihapus Data Akan Hilang",
             icon: "warning",
             buttons: true,
             dangerMode: true,
         })
         .then((willDelete) => {
           if (willDelete) {
             form.submit();
           }else{
               swal("Data Tidak Jadi dihapus");
           }
         });
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
