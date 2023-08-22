@extends('layout.main')

@section('content')
@section('title')
    Menu Makanan
@endsection
@section('active-menu')
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
        <a href="/admin/menu-page" class="btn btn-primary float-right"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </div>
    <div class="card-body">
        <form action="/update/{{ $data->id_menu }}/menu" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama_menu" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama_menu" name="nama_menu" value="{{ $data->nama_menu }}">
            </div>
            <div class="mb-3">
                <label for="tipe" class="form-label">Tipe</label>
                <select class="form-control" id="tipe" name="tipe">
                    <option value="makanan" {{ old('tipe', $data->tipe) === 'makanan' ? 'selected' : '' }}>Makanan</option>
                    <option value="minuman" {{ old('tipe', $data->tipe) === 'minuman' ? 'selected' : '' }}>Minuman</option>
                </select>
            </div>            
            <div class="mb-3">
                <label for="status_menu" class="form-label">Stok</label>
                <select class="form-control" id="exampleFormControlSelect1" name="status_menu">
                    <option value="ready" {{ old('status_menu', $data->status_menu) === 'ready' ? 'selected' : '' }}>Ready</option>
                    <option value="habis" {{ old('status_menu', $data->status_menu) === 'habis' ? 'selected' : '' }}>Habis</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $data->harga }}">
            </div>            
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <br>
                @if ($data->foto)
                    <img id="preview" src="{{ asset('galery/' . $data->foto) }}" alt="Preview" style="width: auto; height: 100px; margin-bottom: 0.5rem;">
                @else
                    <img id="preview" src="{{ asset('placeholder-image.png') }}" alt="Preview" style="width: auto; height: 100px; margin-bottom: 0.5rem;">
                @endif
                <input type="file" class="form-control-file" name="foto" id="foto" accept=".png,.jpg" onchange="previewImage(event, 'preview')">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>        
    </div>
</div>
@endsection