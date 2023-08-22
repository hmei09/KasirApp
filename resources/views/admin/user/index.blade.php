@extends('layout.main')

@section('content')
@section('title')
    Daftar User
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
        <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"><i
                class="fa-solid fa-plus"></i> Tambah User</a>                
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="max-width: 50%;">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="card card-primary card-outline my-2">
                            <div class="card-body">

                                <form action="{{ route('add.user') }}" method="post" id="myForm">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" minlength="8" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Role</label>
                                        <select class="form-select" id="status" name="role" required>
                                            <option value="" disabled selected>- Role -</option>
                                            <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>
                                                Admin</option>
                                            <option value="kasir" {{ old('role') === 'kasir' ? 'selected' : '' }}>
                                                Kasir</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" form="myForm">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover table-bordered mb-3" id="table">
            <thead>
                <th>#</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role</th>
                <th>Action</th>
            </thead>

            <tbody>
                @foreach ($user as $number => $item)
                    <tr class="">
                        <td class="">{{ $number + 1 }}</td>
                        <td class="">{{ $item->name }}</td>
                        <td class="">{{ $item->username }}</td>
                        <td class="">{{ str_pad(str_repeat('•', min(strlen($item->password), 8)), 8, '•') }}</td>
                        {{-- <td class="">{{ str_repeat('•', strlen($item->password)) }}</td> --}}
                        <td class="">{{ $item->role }}</td>
                        <td class="">
                            <a href="" class="text-white btn bg-success btn-hover-effect" data-toggle="modal"
                                data-target="#info-{{ $item->id }}"><i class="fa fa-eye"></i></a>
                            <a href="/edit/{{ $item->id }}/user"
                                class="text-white btn bg-warning btn-hover-effect"><i class="fa fa-edit"></i></a>

                            <button onclick="confirmDeleteUser('{{ $item->id }}')" class="btn btn-danger"><i
                                    class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @foreach ($user as $item)
            <div class="modal fade" id="info-{{ $item->id }}" tabindex="-1"
                aria-labelledby="infoLabel-info-{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- Modal header content goes here -->
                        </div>
                        <div class="modal-body">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->username }}</td>
                                                <td>{{ $item->password }}</td>
                                                <td>{{ $item->role }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- {{$data->links('pagination::bootstrap-5')}} --}}
    </div>
</div>
{{-- {{ $data->links() }} --}}
@endsection
