@extends('layout.main')

@section('content')
@section('title')
    Meja
@endsection
@section('active-meja')
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
        <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-plus"></i> Tambah Meja</a>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="max-width: 50%;">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="card card-primary card-outline my-2">
                            <div class="card-body">
        
                                <form action="{{route('add')}}" method="post" id="myForm">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Status Meja</label>
                                        <select class="form-control" id="status" name="status_meja" required>
                                            <option value="" disabled selected>- Stok Meja -</option>
                                            <option value="kosong" {{ old('status_meja') === 'kosong' ? 'selected' : '' }}>kosong</option>
                                            <option value="penuh" {{ old('status_meja') === 'penuh' ? 'selected' : '' }}>penuh</option>
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
        <table class="table table-hover" id="table">
            <thead>
                <th>No Meja</th>
                <th>Status</th>                
                <th>Action</th>
            </thead>

            <tbody>
                @foreach ($meja as $item)
                    <tr class="">
                        <td class="">{{ $item->no_meja }}</td>
                        <td class="">
                            <select class="form-select" id="exampleFormControlSelect1" name="status_meja" style="width: 100px" data-search="true">
                                <option value="kosong" {{ old('status_meja', $item->status_meja) === 'kosong' ? 'selected' : '' }}>kosong</option>
                                <option value="penuh" {{ old('status_meja', $item->status_meja) === 'penuh' ? 'selected' : '' }}>penuh</option>
                            </select> 
                        </td>                        
                        <td class="">
                            <button onclick="confirmDeleteMeja('{{ $item->no_meja }}')" class="btn btn-danger"><i
                                    class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>       
    </div>
</div>
@endsection
