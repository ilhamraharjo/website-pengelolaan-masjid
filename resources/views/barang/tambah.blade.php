@extends('layout.master')

@section('judul')
Barang
@endsection

@section('content')

<form action="/barang" method="POST">
    @csrf
    <div class="mb-3">
        <label>Barang</label>
        <input type="string" class="form-control" name="brg">
    </div>
    @error('brg')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>

@endsection
