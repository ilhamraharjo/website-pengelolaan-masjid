@extends('layout.master')

@section('judul')
Rekap Kas Masjid
@endsection

@section('content')

@if(auth()->user()->level == 1)
<a href="/rekap/cetak_kas" target="_blank" class="btn btn-secondary mb-3">Cetak <i class="fas fa-print m-1"></i></a>
<a href="/rekap/cetak_tgl" target="" class="btn btn-secondary mb-3">Cetak Pertanggal<i class="fas fa-print m-1"></i></a>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Uraian</th>
            <th scope="col">Pemasukan</th>
            <th scope="col">Pengeluaran</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($kas_masjid as $key => $value)
        <tr>
            <td>{{$key + $kas_masjid->firstItem()}}</td>
            <td>{{$value->tgl_kas}}</td>
            <td>{{$value->uraian}}</td>
            <td>{{number_format ($value->masuk, 0, ',','.')}}</td>
            <td>{{number_format ($value->keluar, 0, ',','.')}}</td>
        </tr>
        @empty
        <tr>
            <td>Data Kosong</td>
        </tr>
        @endforelse
        <tr>
            <td colspan="3">
               <b>Total</b>
            </td>
            <td>
               <b> Rp. {{ number_format($sum_masuk, 0, ',','.') }}</b>
            </td>
            <td>
               <b> Rp. {{ number_format($sum_keluar, 0, ',','.') }}</b>
            </td>
        </tr>
        <tr>
            <td colspan="4">
               <b> Saldo Akhir</b>
            </td>
            <td>
               <b> Rp. {{ number_format($sum_total, 0, ',','.') }}</b>
            </td>
        </tr>
    </tbody>
    </thead>
</table>
<div class="card-footer m-1">
    {{ $kas_masjid->links() }}
</div>

@endsection
