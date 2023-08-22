@extends('layout.main')

@section('content')
@section('title')
    Riwayat Pesanan
@endsection
@section('active-riwayat')
    active
@endsection
@section('open-kasir')
    menu-open
@endsection
@section('active')
    active
@endsection

<div class="card card-primary card-outline my-2">
    <div class="card-header py-2">
    </div>
    <div class="card-body">
        <table class="table table-hover mb-3" id="table">
            <thead class="text-center">
                <th>#</th>
                <th>Tanggal</th>
                <th>Kasir</th>
                <th>No Meja</th>
                <th>Total</th>
                <th>Bayar</th>
                <th>Kembali</th>
                @if (auth()->user()->role === 'admin')
                <th>Action</th>
                @endif
            </thead>

            <tbody>
                @foreach ($view as $number => $item)
                    <tr>
                        <td class="">{{ $number + 1 }}</td>
                        <td class="">{{ $item->tgl_pesanan }}</td>
                        <td class="">{{ ucfirst($item->user->name) }}</td>
                        <td class="">{{ $item->meja->no_meja }}</td>
                        <td class="">Rp. {{ number_format($item->total_harga) }}</td>
                        <td class="">Rp. {{ number_format($item->bayar) }}</td>
                        <td class="">Rp. {{ number_format($item->kembali) }}</td>
                        @if (auth()->user()->role === 'admin')
                        <td class="">
                            <button onclick="confirmDeleteRiwayat('{{ $item->id_pesanan }}')" class="btn btn-danger"><i
                                    class="fa-solid fa-trash"></i></button>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{$data->links('pagination::bootstrap-5')}} --}}
    </div>
</div>
{{-- {{ $data->links() }} --}}
@endsection
