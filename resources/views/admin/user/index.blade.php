@extends('admin.layouts.main')
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">User</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a class="btn btn-primary" href="{{ url('admin/user/create') }}">Tambah User</a>
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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            @if (!empty($item->getRoleNames()))
                                @foreach ($item->getRoleNames() as $role)
                                   {{ $role }}
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <form method="POST" class="d-inline" action="{{ url('admin/user/'.$item->id) }}">
                                @csrf
                                <a class="btn btn-warning ml-1" href="{{ url('admin/user/'.$item->id.'/edit') }}"><i class="fas fa-edit"></i></a>
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-xs btn-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash"></i></button>
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