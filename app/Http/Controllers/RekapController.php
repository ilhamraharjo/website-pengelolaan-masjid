<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KasMasjid;

class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $kas_masjid = KasMasjid::orderBy('tgl_kas','ASC')->paginate(4);
        $sum_masuk = KasMasjid::where('jenis','=','masuk')->sum('masuk');
        $sum_keluar = KasMasjid::where('jenis','=','keluar')->sum('keluar');
        $sum_total = $sum_masuk-$sum_keluar;
        return view('rekap.index', compact('kas_masjid','sum_total','sum_masuk','sum_keluar'));
    }

    public function cetak()
    {
        $kas_masjid = KasMasjid::orderBy('tgl_kas','ASC')->get();
        $sum_masuk = KasMasjid::where('jenis','=','masuk')->sum('masuk');
        $sum_keluar = KasMasjid::where('jenis','=','keluar')->sum('keluar');
        $sum_total = $sum_masuk-$sum_keluar;
        return view('rekap.cetak_kas',compact('kas_masjid','sum_total','sum_masuk','sum_keluar'));
    }

    public function cetaktgl()       
    {
        $cetak_kas = KasMasjid::get();
        return view('rekap.cetak_tgl',['kas_masjid'=>$cetak_kas]);
    }

    public function cetakPertgl($tgl_awal, $tgl_akhir)
    {
        // dd(["Tanggal Awal : ".$tgl_awal, "Tanggal Akhir : ".$tgl_akhir]);
        $cetak = KasMasjid::orderBy('tgl_kas','ASC')->whereBetween('tgl_kas',[$tgl_awal, $tgl_akhir])->get();
        $sum_masuk = KasMasjid::where('jenis','=','masuk')->sum('masuk');
        $sum_keluar = KasMasjid::where('jenis','=','keluar')->sum('keluar');
        $sum_total = $sum_masuk-$sum_keluar;
        return view('rekap.cetak_pertanggal',compact('cetak','sum_total','sum_masuk','sum_keluar'));
    }

   
}
