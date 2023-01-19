@extends('layout.master')

@section('judul')
Dashboard
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-3">
            <div class="card bg-success" style="width: 15rem;">
                <div class="card-body">
                <h3 class="card-title">Total Kas</h3>
                    <h2 class="card-text">Rp. {{ number_format($sum_total, 0, ',','.') }}</h2>
                </div>
            </div>
        </div>
        <div class="col-3">
        <div class="card bg-primary" style="width: 15rem;">               
                <div class="card-body">
                    <h3 class="card-title">Jadwal khotbah</h3>
                    <h2 class="card-text">{{ $jadwal_khotbah }}</h2>
                </div>
            </div>
        </div>
        <div class="col-3">
        <div class="card bg-yellow" style="width: 15rem;">
                <div class="card-body">
                <h3 class="card-title">Jadwal Kegiatan</h3>
                <h2 class="card-text">{{ $kegiatan }}</h2>
                </div>
            </div>
        </div>
        <div class="col-3">
        <div class="card bg-teal" style="width: 15rem;">
                <div class="card-body">
                <h3 class="card-title">Inventaris</h3>
                <h2 class="card-text">{{ $inventaris }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
