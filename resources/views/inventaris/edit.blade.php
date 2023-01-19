@extends('layout.master')

@section('judul')
Edit Inventaris
@endsection

@section('content')

<form action="/inventaris/{{$inventaris->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Tanggal Penerimaan</label>
        <input type="date" class="form-control" name="tgl_ivt" style="width:25%" value="{{$inventaris->tgl_ivt}}">
    </div>
    @error('tanggal')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label>Barang</label>
        <select name="barang_id" class="form-control">
        <option value="brg">--Barang--</option>
        @foreach($barang as $item)
            @if ($item->id === $inventaris->barang_id)
                <option value="{{$item->id}}" selected>{{$item->brg}}</option>
            @else
                <option value="{{$item->id}}">{{$item->brg}}</option>
            @endif
        @endforeach
    </select>
    </div>
    <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" class="form-control" name="jumlah" value="{{$inventaris->jumlah}}">
    </div>
    @error('Jumlah')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label>Keterangan</label>
        <input type="text" class="form-control" name="ket_ivt" value="{{$inventaris->ket_ivt}}">
    </div>
    @error('Keterangan')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Edit</button>
</form>

@endsection
