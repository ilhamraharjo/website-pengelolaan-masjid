@extends('layout.master')

@section('judul')
Inventaris
@endsection

@section('content')

@if(auth()->user()->level == 1)
<a href="/inventaris/tambah" class="btn btn-primary mb-3">Tambah <i class="fas fa-plus-square m-1"></i></a>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal Penerimaan</th>
            <th scope="col">Barang</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Keterangan</th>
            @if(auth()->user()->level == 1)
            <th scope="col">Aksi</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @forelse ($inventaris as $key => $value)
        <tr>
            <td>{{$key + $inventaris->firstItem()}}</td>
            <td>{{$value->tgl_ivt}}</td>
            <td>{{$value->barang->brg}}</td>
            <td>{{$value->jumlah}}</td>
            <td>{{$value->ket_ivt}}</td>
            @if(auth()->user()->level == 1)
            <td>
                <form action="/inventaris/{{$value->id}}" method="POST">
                    <a href="/inventaris/{{$value->id}}/edit" class="btn btn-info btn-sm">Edit</i></a>
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Hapus" class="btn btn-danger btn-sm">   
                </form>
            </td>
            @endif
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
    {{ $inventaris->links() }}
</div>

@endsection
