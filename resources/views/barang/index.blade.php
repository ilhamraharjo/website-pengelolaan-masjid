@extends('layout.master')

@section('judul')
Barang
@endsection

@section('content')

<a href="/barang/tambah" class="btn btn-primary mb-3">Tambah <i class="fas fa-plus-square m-1"></i></a>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Barang</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($barang as $key => $value)
        <tr>
            <td>{{$key + $barang->firstItem()}}</td>
            <td>{{$value->brg}}</td>
            <td>
                <form action="/barang/{{$value->id}}" method="POST">
                    <a href="/barang/{{$value->id}}/edit" class="btn btn-info btn-sm">Edit</i></a>
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td>Data Kosong</td>
        </tr>
        @endforelse
    </tbody>
    </thead>
</table>
<div class="card-footer m-1">
    {{ $barang->links() }}
</div>
@endsection
