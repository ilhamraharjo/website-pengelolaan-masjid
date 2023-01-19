@extends('layout.master')

@section('judul')
Edit Pemasukan
@endsection

@section('content')

<form action="/KasMasuk/{{$kas_masjid->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" class="form-control" name="tgl_kas" value="{{$kas_masjid->tgl_kas}}" style="width:25%">
    </div>
    @error('tanggal')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label>Uraian</label>
        <input type="text" class="form-control" name="uraian" value="{{$kas_masjid->uraian}}">
    </div>
    @error('uraian')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label>Jumlah</label>
        <input type="text" class="form-control" name="masuk" value="{{$kas_masjid->masuk}}">
    </div>
    @error('masuk')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Edit</button>
</form>

@endsection
