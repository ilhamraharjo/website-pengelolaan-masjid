@extends('layout.master')

@section('judul')
Tambah Inventaris
@endsection

@section('content')

<form action="/inventaris" method="POST">  
    @csrf
    <div class="mb-3">
        <label>Tanggal Penerimaan</label>
        <input type="date" class="form-control" name="tgl_ivt" style="width:25%">
    </div>
    @error('tanggal')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
    <label>Barang</label>
    <select name="barang_id" class="form-control">
        <option value="">--Barang--</option>
        @foreach($barang as $item)
            <option value="{{$item->id}}">{{$item->brg}}</option>
        @endforeach
    </select>    
  </div>
    <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" class="form-control" name="jumlah">
    </div>
    @error('jumlah')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label>Keterangan</label>
        <input type="text" class="form-control" name="ket_ivt">
    </div>
    @error('ket_ivt')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>

@endsection
