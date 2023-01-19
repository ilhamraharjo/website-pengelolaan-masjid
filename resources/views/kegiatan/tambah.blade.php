@extends('layout.master')

@section('judul')
Tambah Kegiatan
@endsection

@section('content')

<form action="/kegiatan" method="POST" enctype="multipart/form-data">  
    @csrf
    <div class="mb-3">
        <label>Kegiatan</label>
        <input type="text" class="form-control" name="keg">
    </div>
    @error('kegiatan')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" class="form-control" name="tgl_keg" style="width:25%">
    </div>
    @error('tanggal')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label>Keterangan</label>
        <textarea name="ket" class="form-control" id="exampleFormControlTextarea1"  rows="3"></textarea>
    </div>
    @error('Keterangan')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
    <label>Gambar</label>
    <input type="file" class="form-control" name="gambar">
  </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>

@endsection
