@extends('layout.main')

@section('content')
@section('title')
    Edit User
@endsection
@section('active-user')
    active
@endsection
@section('open-menu')
    menu-open
@endsection
@section('active-admin')
    active
@endsection
<div class="card card-primary card-outline my-2">
    <div class="card-header py-2">
        <a href="/admin/user-page" class="btn btn-primary float-right"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </div>
    <div class="card-body">
        <form action="/update/{{ $data->id }}/user" method="post">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="name" value="{{$data->name}}">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{$data->username}}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" minlength="8" required value="{{$data->password}}">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" id="role" name="role" required>
                    <option value="" disabled selected>- Role -</option>
                    <option value="admin" {{ old('role', $data->role) === 'admin' ? 'selected' : '' }}>
                        Admin</option>
                    <option value="kasir" {{ old('role', $data->role) === 'kasir' ? 'selected' : '' }}>
                        Kasir</option>
                </select>
            </div>          
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>        
    </div>
</div>
@endsection