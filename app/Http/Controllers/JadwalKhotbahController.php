<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalKhotbah;

class JadwalKhotbahController extends Controller
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
        $jadwal = JadwalKhotbah::orderBy('tgl_khotbah','ASC')->paginate(4);
        return view('jadwalk.index',['jadwal_khotbah'=>$jadwal]);
    }

    public function cetak()
    {
        $cetak_jadwal = JadwalKhotbah::orderBy('tgl_khotbah','ASC')->get();
        return view('jadwalk.cetak_jadwal',['jadwal_khotbah'=>$cetak_jadwal]);
    }

    public function cetaktgl()       
    {
        $cetak_jadwal = JadwalKhotbah::get();
        return view('jadwalk.cetak_tgl',['jadwal_khotbah'=>$cetak_jadwal]);
    }

    public function cetakPertgl($tgl_awal, $tgl_akhir)
    {
        //dd(["Tanggal Awal : ".$tgl_awal, "Tanggal Akhir : ".$tgl_akhir]);
        $cetak_jadwal = JadwalKhotbah::orderBy('tgl_khotbah','ASC')->whereBetween('tgl_khotbah',[$tgl_awal, $tgl_akhir])->get();
        return view('jadwalk.cetak_pertanggal',['jadwal_khotbah'=>$cetak_jadwal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jadwalk.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tgl_khotbah' => 'required',
            'penceramah' => 'required',
        ]);

        $jadwal = new JadwalKhotbah;
        
        $jadwal->tgl_khotbah = $request->tgl_khotbah;
        $jadwal->penceramah = $request->penceramah;

        $jadwal->save();

        return redirect('/jadwalk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwal = JadwalKhotbah::find($id);

        return view('jadwalk.edit',['jadwal_khotbah' => $jadwal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tgl_khotbah' => 'required',
            'penceramah' => 'required'
        ]);

                $jadwal = JadwalKhotbah::find($id);

                $jadwal->tgl_khotbah = $request['tgl_khotbah'];
                $jadwal->penceramah = $request['penceramah'];
                $jadwal->save();

                return redirect('/jadwalk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal = JadwalKhotbah::find($id);
        $jadwal->delete();

        return redirect('/jadwalk');
    }
}
