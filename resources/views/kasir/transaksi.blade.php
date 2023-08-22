@extends('layout.main')

@section('content')
@section('active')
    active
@endsection
@section('active-tran')
    active
@endsection
@section('title')
    Transaksi
@endsection
@section('open-kasir')
    menu-open
@endsection
<div class="card card-primary card-outline my-2">

    <div class="card-body row">
        <div class="col-8">
            <div class="card card-secondary card-outline">
                <div class="card-body">
                    <table class="table table-hover mb-3" id="table">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Nama Menu</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Add</th>
                            <th scope="col" hidden>Form</th>
                        </thead>

                        <tbody id="menu-table-body">
                            @foreach ($menu as $number => $item)
                                <tr class="menu-row">
                                    <td>{{ $number + 1 }}</td>
                                    <td>{{ $item->nama_menu }}</td>
                                    <td>{{ ucfirst($item->status_menu) }}</td>
                                    <td>
                                        {{-- <input type="number" value="1" class="form-control quantity-input"
                                            style="width: 60px" id="quantity{{ $item->id_menu }}" name="qty"
                                            oninput="updateSubtotal(this)"> --}}
                                        <!-- Input quantity-input di luar form -->
                                        <input type="number" value="1" class="form-control quantity-input"
                                            style="width: 60px" id="quantityOutside{{ $item->id_menu }}" name="qty"
                                            oninput="updateSubtotalOutside(this)">
                                    </td>
                                    <td class="menu-price" data-price="{{ $item->harga }}">Rp.
                                        {{ number_format($item->harga) }}</td>
                                    <td><span class="subtotal">0</span></td>
                                    <td><button type="submit" class="btn btn-outline-success"
                                            form="myForm{{ $item->id_menu }}"><i class="fa-solid fa-plus"></i></button>
                                    </td>
                                    <td>
                                        <form action="/add/detail" method="post" id="myForm{{ $item->id_menu }}"
                                            hidden>
                                            @csrf
                                            {{-- <input type="text" value="{{ $item->pesanan->id_pesanan }}" name="id_pesanan" hidden> --}}
                                            <input type="text" value="{{ $item->id_menu }}" name="id_menu" hidden>
                                            <input type="number" value="1" class="form-control quantity-input"
                                                style="width: 60px" id="quantity{{ $item->id_menu }}" name="qty"
                                                oninput="updateSubtotal(this)" hidden>
                                            <input type="text" value="" name="sub_total" hidden>
                                            <textarea name="keterangan_pesanan" id="" cols="30" rows="10" hidden></textarea>
                                            <select name="status_detail_masakan" id="" hidden>
                                                <option value="dimasak" selected>Dimasak</option>
                                                <option value="ready">Ready</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card card-secondary card-outline">
                <div class="card-body">
                    <form action="{{ route('pesanan.checkout') }}" method="POST" id="formPesanan">
                        @csrf
                        <div class="form-group row mb-2">
                            <label for="disabledTextInput" class="form-label col-4">Tanggal</label>
                            <div class="col-8">
                                <input type="date" id="disabledTextInput" class="form-control-plaintext"
                                    value="{{ date('Y-m-d') }}" name="tgl_pesanan" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="disabledTextInput" class="form-label col-4">Kasir:</label>
                            <div class="col-8">
                                <input type="text" id="disabledTextInput" class="form-control"
                                    value="{{ ucfirst(Auth::user()->name) }}" readonly>
                                <input type="number" id="disabledTextInput" class="form-control"
                                    value="{{ Auth::user()->id }}" readonly name="id" hidden>                                
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="" class="form-label col-4">Meja</label>
                            <div class="col-8">
                                <select class="form-select" aria-label="Default select example" style="width: 100%;"
                                    name="no_meja" id="no_meja" required>
                                    <option selected disabled>Pilih No Meja</option>
                                    @foreach ($meja as $item)
                                        <option value="{{ $item->no_meja }}">{{ $item->no_meja }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="col-1">#</th>
                                    <th class="col-4">Nama Barang</th>
                                    <th class="col-1 text-center">Qty</th>
                                    <th class="col-3 text-right">Harga</th>
                                    <th class="col-3 text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail as $number => $item)
                                    <tr id="row-{{ $item->id_detail }}">
                                        {{-- <td>{{ $item->id_pesanan }}</td> --}}
                                        <td>
                                            <button class="btn btn-outline-danger btn-sm delete-button"
                                                data-id="{{ $item->id_detail }}"
                                                data-url="{{ route('delete.detail', $item->id_detail) }}">
                                                <i class="fa-solid fa-trash fa-lg"></i>
                                            </button>
                                        </td>
                                        <td class="">{{ $item->menu->nama_menu }}</td>
                                        <td class="text-center" style="d">{{ $item->qty }}</td>
                                        <td class="text-right">{{ $item->menu->harga }}</td>
                                        <td class="text-right sub-total">{{ $item->sub_total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <div class="mb-2">
                            <input type="number" class="form-control" name="total_harga" id="hidden-total" hidden
                                value="">
                        </div>
                        <div class="form-floating">
                            <input type="number" class="form-control" id="floatingnumber" placeholder="number" value="{{ old('bayar') }}"
                                name="bayar" oninput="updateBayar(this.value)">
                            <label for="floatingnumber" class="font-weight-normal">Bayar</label>
                        </div>
                        <div class="form-group">
                            <!-- Add the hidden input field to store the Kembalian value -->
                            <input type="number" class="form-control" name="kembali" id="hidden-kembalian" hidden
                                value="">
                        </div>
                        <hr>
                    </form>
                    <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                        <b>Total</b>
                        <span id="total"><b>0</b></span>
                    </li>
                    <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                        <b>Bayar</b>
                        <span id="bayar"><b>0</b></span>
                    </li>
                    <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                        <b>Kembalian</b>
                        <span id="kembalian"><b>0</b></span>
                    </li>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <div class="">
                    <button class="btn btn-primary" onclick="confirmDeleteDetail()"><i
                            class="fa-solid fa-arrows-rotate"></i> New Transaksi</button>
                </div>
                <div class="">
                    <button class="btn btn-success" form="formPesanan"><i class="fa-solid fa-check"></i>
                        Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
