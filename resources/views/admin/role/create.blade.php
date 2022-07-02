@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <h3 class="mb-3">Tambah Data Role</h3>
            <form class="user" method="POST" action="{{ url('admin/role') }}">
                @csrf
                <div class="form-group">
                            <label for="">Role</label>
                            <input type="text" id="" name="name" class="form-control round" name="role" placeholder="Role">
                </div>
                <label for="">Permissions</label>
                <div class="checkbox">
                    @foreach ($permission as $item)
                     <div class="form-check">
                     <input class="form-check-input" type="checkbox" value="{{ $item->id }}" name="permission[]" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                         {{ $item->name }}
                     </label>
                     </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-user px-5 mt-3" type="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection