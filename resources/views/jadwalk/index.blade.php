@extends('layout.master')

@section('judul')
Jadwal Khotbah
@endsection

@section('content')

@if(auth()->user()->level == 1)
<a href="/jadwalk/tambah" class="btn btn-primary mb-3">Tambah <i class="fas fa-plus-square m-1"></i></a>
<a href="/jadwalk/cetak_jadwal" target="_blank" class="btn btn-secondary mb-3">Cetak <i class="fas fa-print m-1"></i></a>
<a href="/jadwalk/cetak_tgl" target="" class="btn btn-secondary mb-3">Cetak Pertanggal<i class="fas fa-print m-1"></i></a>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Penceramah</th>
            @if(auth()->user()->level == 1)
            <th scope="col">Aksi</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @forelse ($jadwal_khotbah as $key => $value)
        <tr>
            <td>{{$key + $jadwal_khotbah->firstItem()}}</td>
            <td>{{$value->tgl_khotbah}}</td>
            <td>{{$value->penceramah}}</td>
            @if(auth()->user()->level == 1)
            <td>
                <form action="/jadwalk/{{$value->id}}" method="POST">
                    <a href="/jadwalk/{{$value->id}}/edit" class="btn btn-info btn-sm">Edit</a>
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
    {{ $jadwal_khotbah->links() }}
</div>

@endsection
