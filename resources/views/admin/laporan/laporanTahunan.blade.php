@extends('layout.main')

@section('content')
@section('title')
    Laporan Pesanan
@endsection
@section('active-admin')
    active
@endsection
@section('open-menu')
    menu-open
@endsection
@section('active-laporan')
    active
@endsection

<div class="card card-primary card-outline my-2">
    <div class="card-header py-2">
        <a href="#" class="btn btn-primary float-end" onclick="printTable()"><i class="fa-solid fa-print"></i> <b>Print PDF</b></a>
        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                Filter
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('report') }}">Hari</a></li>
                <li><a class="dropdown-item" href="{{ route('bulanan') }}">Bulan</a></li>
                <li><a class="dropdown-item" href="{{ route('tahunan') }}">Tahun</a></li>
            </ul>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover mb-3" id="table">
            <thead class="text-center">
                <th>#</th>
                <th>Periode</th>
                <th>Total</th>
                <th hidden>Action</th>
            </thead>

            <tbody>
                @php
                    $totalByYear = [];
                    $uniqueYears = [];
                @endphp

                @foreach ($report as $number => $item)
                    @php
                        // Menghitung total harga per tahun
                        $year = date('Y', strtotime($item->tgl_pesanan));
                        $totalByYear[$year] = ($totalByYear[$year] ?? 0) + $item->total_harga;
                    @endphp
                @endforeach

                @foreach ($report as $number => $item)
                    @php
                        $year = date('Y', strtotime($item->tgl_pesanan));
                    @endphp

                    @if (!in_array($year, $uniqueYears))
                        @php
                            $uniqueYears[] = $year;
                        @endphp

                        <tr>
                            <td class="">{{ count($uniqueYears) }}</td>
                            <td class="">{{ $year }}</td>
                            <td class="">Rp. {{ number_format($totalByYear[$year]) }}</td>
                            <td class="" hidden>
                                <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        {{-- {{$data->links('pagination::bootstrap-5')}} --}}
    </div>
</div>
{{-- {{ $data->links() }} --}}
@endsection
