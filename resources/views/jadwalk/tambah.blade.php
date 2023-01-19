@extends('layout.master')

@section('judul')
Tambah Jadwal
@endsection

@section('content')

<form action="/jadwalk" method="POST">
    @csrf
    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" class="form-control" name="tgl_khotbah">
    </div>
    @error('tanggal')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label>Penceramah</label>
        <input type="text" class="form-control" name="penceramah">
    </div>
    @error('penceramah')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>

@endsection
