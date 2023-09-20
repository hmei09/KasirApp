<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PrintStrukPdf</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="pt-5 d-flex justify-content-center">
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
                            <input type="text" id="disabledTextInput" class="form-control-plaintext"
                                value="{{ ucfirst(Auth::user()->name) }}" readonly>                                                         
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="" class="form-label col-4">Meja</label>
                        <div class="col-8">
                            <div>{{$pesanan->no_meja}}</div>
                        </div>

                    </div>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr class="">
                                <th class="col-1">#</th>
                                <th class="col-2">Nama Barang</th>
                                <th class="col-1 text-center">Jumlah</th>
                                <th class="col-4 text-right">Harga</th>
                                <th class="col-4 text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail as $number => $item)
                                <tr id="row-{{ $item->id_detail }} row">                                    
                                    <td class="">
                                        {{$number +1}}
                                    </td>
                                    <td class="text-left">{{ $item->menu->nama_menu }}</td>
                                    <td class="text-center" style="d">{{ $item->qty }}</td>
                                    <td class="text-right">Rp {{ number_format($item->menu->harga) }}</td>
                                    <td class="text-right">Rp {{ number_format($item->sub_total)}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <hr>
                </form>
                <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                    <b>Total</b>
                    <span id="total"><b>Rp {{number_format($pesanan->total_harga)}}</b></span>
                </li>
                <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                    <b>Bayar</b>
                    <span id="bayar"><b>Rp {{number_format($pesanan->bayar)}}</b></span>
                </li>
                <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                    <b>Kembalian</b>
                    <span id="kembalian"><b>Rp {{number_format($pesanan->kembali)}}</b></span>
                </li>
                <div class="d-flex justify-content-center py-4">
                    <span>*Termia Kasih Telah Berbelanja</span>
                </div>
            </div>
        </div>        
    </div>

    <script type="text/javascript">
        window.print();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>