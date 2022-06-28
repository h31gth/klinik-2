@extends('admin.layouts.main')
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Pendaftaran</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a class="btn btn-primary" href="{{ url('admin/pendaftaran/create') }}">Tambah Pendaftaran</a>
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
                              <div class="btn btn-success btn-sm">Sudah Selesai</div>
                              @else
                              <form action="{{ url('admin/pendaftaran/'.$item->id) }}" class="d-inline" method="POST">
                                @method('put')
                                @csrf
                                <button class="btn btn-success btn-sm ml-1 border-0 alert_notif" onclick="return confirm('Selesaikan Pendaftaran ?')">Selesai</button>
                              </form>
                            <form action="{{ url('admin/pendaftaran/'.$item->id) }}" class="d-inline" method="POST">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-sm ml-1 border-0 alert_notif" onclick="return confirm('Batalkan Pendaftaran ?')">Batalkan</button>
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
    @if(Session::has('message'))
  swal({
    title: "Success",
    text: "{{ session('message') }}",
    icon: "success",
  });
  @endif
</script>
@endsection
