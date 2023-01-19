@extends('layout.master')

@section('judul')
Edit Barang
@endsection

@section('content')

<form action="/barang/{{$barang->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Barang</label>
        <input type="string" class="form-control" name="brg" value="{{$barang->brg}}">
    </div>
    @error('barang')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Edit</button>
</form>

@endsection
