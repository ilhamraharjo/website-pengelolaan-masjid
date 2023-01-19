@extends('layout.master')

@section('judul')
Tambah Pemasukan
@endsection

@section('content')

<form action="/KasMasuk" method="POST">
    @csrf
    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" class="form-control" name="tgl_kas" style="width:25%">
    </div>
    @error('tanggal')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label>Uraian</label>
        <input type="text" class="form-control" name="uraian">
    </div>
    @error('uraian')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" class="form-control" name="masuk">
    </div>
    @error('masuk')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>

@endsection
