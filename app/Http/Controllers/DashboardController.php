<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KasMasjid;
use App\Models\JadwalKhotbah;
use App\Models\Kegiatan;
use App\Models\Inventaris;


class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $sum_masuk = KasMasjid::where('jenis','=','masuk')->sum('masuk');
        $sum_keluar = KasMasjid::where('jenis','=','keluar')->sum('keluar');
        $sum_total = $sum_masuk-$sum_keluar;
        $jadwal_khotbah = JadwalKhotbah::count();
        $kegiatan = Kegiatan::count();
        $inventaris = Inventaris::count();

        return view('dashboard', compact('jadwal_khotbah','kegiatan','inventaris','sum_total'));
    }
}
