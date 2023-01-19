@extends('layout.master')

@section('judul')
Cetak Laporan
@endsection

@section('content')

<form action="">
    <div class="mb-3">
        <label>Tanggal Awal</label>
        <input type="date" class="form-control" name="tgl_awal" id="tgl_awal" style="width:25%">
    </div>
    <div class="mb-3">
        <label>Tanggal Akhir</label>
        <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir" style="width:25%">
    </div>
    <a href="" onclick="this.href='/rekap/cetak_pertanggal/'+ document.getElementById('tgl_awal').value + 
    '/' + document.getElementById('tgl_akhir').value" target="_blank" class="btn btn-secondary mb-3">
        Cetak <i class="fas fa-print m-1"></i></a>
</form>

@endsection
