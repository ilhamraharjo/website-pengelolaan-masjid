@extends('layout.master')

@section('judul')
Edit Jadwal
@endsection

@section('content')

<form action="/jadwalk/{{$jadwal_khotbah->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" class="form-control" name="tgl_khotbah" value="{{$jadwal_khotbah->tgl_khotbah}}">
    </div>
    @error('tanggal')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label>Penceramah</label>
        <input type="text" class="form-control" name="penceramah" value="{{$jadwal_khotbah->penceramah}}">
    </div>
    @error('penceramah')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Edit</button>
</form>

@endsection
