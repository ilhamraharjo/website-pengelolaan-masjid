@extends('layout.master')

@section('judul')
Kegiatan
@endsection

@section('content')

@if(auth()->user()->level == 1)
<a href="/kegiatan/tambah" class="btn btn-primary mb-3">Tambah <i class="fas fa-plus-square m-1"></i></a>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kegiatan</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Gambar</th>
            @if(auth()->user()->level == 1)
            <th scope="col">Aksi</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @forelse ($kegiatan as $key => $value)
        <tr>
            <td>{{$key + $kegiatan->firstItem()}}</td>
            <td>{{$value->keg}}</td>
            <td>{{$value->tgl_keg}}</td>
            <td>{{$value->ket}}</td>
            <td>
                <img src="{{asset('image/'.$value->gambar)}}" width="60px" alt="">
            </td>
            @if(auth()->user()->level == 1)
            <td>
                <form action="/kegiatan/{{$value->id}}" method="POST">
                    <a href="/kegiatan/{{$value->id}}/edit" class="btn btn-info btn-sm">Edit</a>
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
    {{ $kegiatan->links() }}
</div>

@endsection
