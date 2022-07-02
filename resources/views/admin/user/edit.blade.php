@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <h3 class="mb-3">Edit Data User</h3>
            <form class="user" method="POST" action="{{ url('admin/user/'.$user->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                            <input type="text" id="" name="name" class="form-control round @error('name') is-invalid @enderror" placeholder="Name" value="{{ $user->name }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                </div>
                <div class="form-group">
                            <input type="email" id="" name="email" class="form-control round @error('email') is-invalid @enderror" placeholder="Email" value="{{ $user->email }}">
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
                                            @if(old('role',$userRole->id) == $item->id)
                                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                            @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                            @endforeach
                            </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-user px-5" type="submit">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection