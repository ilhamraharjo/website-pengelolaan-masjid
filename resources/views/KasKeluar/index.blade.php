@extends('layout.master')

@section('judul')
Pengeluaran
@endsection

@section('content')

<a href="/KasKeluar/tambah" class="btn btn-primary mb-3">Tambah <i class="fas fa-plus-square m-1"></i></a>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Uraian</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($kas_masjid as $key => $value)
        <tr>
            <td>{{$key + $kas_masjid->firstItem()}}</td>
            <td>{{$value->tgl_kas}}</td>
            <td>{{$value->uraian}}</td>
            <td>{{number_format ($value->keluar, 0, ',','.')}}</td>
            <td>
                <form action="/KasKeluar/{{$value->id}}" method="POST">
                    <a href="/KasKeluar/{{$value->id}}/edit" class="btn btn-info btn-sm">Edit</a>
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
        <tr>
            <td colspan="3">
                <b>Total Pengeluaran</b>
            </td>
            <td>
               <b> Rp. {{ number_format($sum_total, 0, ',','.') }}</b>
            </td>
            <td>
            </td>
        </tr>
    </tbody>
    </thead>
</table>
<div class="card-footer m-1">
    {{ $kas_masjid->links() }}
</div>

@endsection
