@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <h3 class="mb-3">Tambah Data User</h3>
            <form class="user" method="POST" action="{{ url('admin/user') }}">
                @csrf
                <div class="form-group">
                            <input type="text" id="" name="name" class="form-control round @error('name') is-invalid @enderror" placeholder="Name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                </div>
                <div class="form-group">
                            <input type="email" id="" name="email" class="form-control round @error('email') is-invalid @enderror" placeholder="Email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                </div>
                <div class="form-group">
                            <input type="password" id="" name="password" class="form-control round @error('password') is-invalid @enderror" placeholder="Password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                </div>
                <div class="form-group">
                            <label for="">Role</label>
                            <select name="role" id="" class="form-control text-center">
                                @foreach ($roles as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-user px-5" type="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection