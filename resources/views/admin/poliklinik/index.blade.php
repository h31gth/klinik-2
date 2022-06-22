@extends('admin.layouts.main')
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Poliklinik</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a class="btn btn-primary" href="{{ url('admin/poliklinik/create') }}">Tambah Poliklinik</a>
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
                        <th>Poliklinik</th>
                        <th>Deskripsi</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td><img src="{{ url($item->image) }}" width="100px" height="75px" class="img-thumbnail mt-2 mb-4"/></td>
                        <td>
                            <a class="btn btn-warning ml-1" href="{{ url('admin/poliklinik/'.$item->id.'/edit') }}"><i class="fas fa-edit"></i></a>
                            <form action="{{ url('admin/poliklinik/'.$item->id) }}" class="d-inline" method="POST">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger ml-1 border-0 alert_notif" onclick="return confirm('Hapus Data ?')"><i class="fas fa-trash-alt"></i></button>
                              </form>
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
