@extends('layout.master')

@section('judul')
Edit Kegiatan
@endsection

@section('content')

<form action="/kegiatan/{{$kegiatan->id}}" method="POST" enctype="multipart/form-data">  
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Kegiatan</label>
        <input type="text" class="form-control" name="keg" value="{{$kegiatan->keg}}">
    </div>
    @error('kegiatan')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" class="form-control" name="tgl_keg" style="width:25%" value="{{$kegiatan->tgl_keg}}">
    </div>
    @error('tanggal')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label>Keterangan</label>
        <textarea name="ket" class="form-control" id="exampleFormControlTextarea1"  rows="3">{{$kegiatan->ket}}</textarea>
    </div>
    @error('ket')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
    <label>Gambar</label>
    <input type="file" class="form-control" name="gambar" value="{{asset('image/'.$kegiatan->gambar)}}">
  </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>

@endsection
