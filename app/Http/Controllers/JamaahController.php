<?php

namespace App\Http\Controllers;
use App\Models\Kegiatan;
use App\Models\KasMasjid;
use App\Models\JadwalKhotbah;
use File;

use Illuminate\Http\Request;

class JamaahController extends Controller
{
    public function kegiatan() {
        $kegiatan = Kegiatan::orderBy('tgl_keg', 'DESC')->limit(3)->get();
        $jadwalk = JadwalKhotbah::orderBy('tgl_khotbah', 'DESC')->limit(3)->get();
        $sum_masuk = KasMasjid::where('jenis','=','masuk')->sum('masuk');
        $sum_keluar = KasMasjid::where('jenis','=','keluar')->sum('keluar');
        $sum_total = $sum_masuk-$sum_keluar;
        return view('jamaah',compact('kegiatan','sum_total','sum_masuk','sum_keluar','jadwalk'));
    }


    // public function rekap() {
    //         $sum_masuk = KasMasjid::where('jenis','=','masuk')->sum('masuk');
    //         $sum_keluar = KasMasjid::where('jenis','=','keluar')->sum('keluar');
    //         $sum_total = $sum_masuk-$sum_keluar;

    //         return view('jamaah', compact('sum_total','sum_keluar','sum_masuk'));
    // }


        // public function kas()
        // {
        //     $sum_masuk = KasMasjid::where('jenis','=','masuk')->sum('masuk');
        //     $sum_keluar = KasMasjid::where('jenis','=','keluar')->sum('keluar');
        //     $sum_total = $sum_masuk-$sum_keluar;

        //     return view('jamaah', compact('sum_total'));
        // }

    // public function kas ()
    // {
    //     $kas_masjid = KasMasjid::orderBy('tgl_kas','ASC');
    //     $sum_masuk = KasMasjid::where('jenis','=','masuk')->sum('masuk');
    //     $sum_keluar = KasMasjid::where('jenis','=','keluar')->sum('keluar');
    //     $sum_total = $sum_masuk-$sum_keluar;
    //     return view('jamaah', compact('kas_masjid','sum_total','sum_masuk','sum_keluar'));
    // }
}
