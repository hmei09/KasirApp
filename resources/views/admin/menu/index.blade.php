@extends('layout.main')

@section('content')
@section('title')
    Menu Makanan
@endsection
@section('active-menu')
    @if (request()->is('admin/menu-page'))
        active
    @endif
@endsection
@section('open-menu')
    menu-open
@endsection
@section('active-admin')
    active
@endsection
<div class="card card-primary card-outline my-2">
    <div class="card-header py-2">
        <a href="/add/data-menu" class="btn btn-primary float-right"><i class="fa-solid fa-plus"></i> Tambah Menu</a>
    </div>
    <div class="card-body">
        <table class="table table-hover table-bordered mb-3" id="table">
            <thead>
                <th>#</th>
                <th>Nama Menu</th>
                <th>Jenis</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>Action</th>
            </thead>

            <tbody>
                @foreach ($data as $number => $item)
                    <tr class="">
                        <td class="">{{ $number + 1 }}</td>
                        <td class="">{{ ucfirst($item->nama_menu) }}</td>
                        <td class="">{{ ucfirst($item->tipe) }}</td>
                        <td class="">{{ ucfirst($item->status_menu) }}</td>
                        <td class="">Rp. {{ number_format($item->harga) }}</td>
                        <td class=""><img src="{{ asset('galery/' . $item->foto) }}"
                                class="img-thumbnail img-responsive" alt=""
                                style="height: 100px; width: 150px; object-fit: cover;"></td>
                        <td class="">
                            <a href="/edit/{{ $item->id_menu }}/menu"
                                class="text-white btn bg-warning btn-hover-effect"><i class="fa fa-edit"></i></a>
                            <button onclick="confirmDelete('{{ $item->id_menu }}')" class="btn btn-danger"><i
                                    class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{-- {{$data->links('pagination::bootstrap-5')}} --}}
    </div>
</div>
{{-- {{ $data->links() }} --}}
@endsection
