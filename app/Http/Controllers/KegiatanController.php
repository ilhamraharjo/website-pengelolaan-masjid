<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use File;

class KegiatanController extends Controller
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
        $kegiatan = Kegiatan::orderBy('tgl_keg','ASC')->paginate(4);
        return view('kegiatan.index',['kegiatan'=>$kegiatan]);
    }

    public function cetaktgl()       
    {
        $cetak_kegiatan = Kegiatan::get();
        return view('kegiatan.cetak_tgl',['kegiatan'=>$cetak_kegiatan]);
    }

    public function cetakPertgl($tgl_awal, $tgl_akhir)
    {
        //dd(["Tanggal Awal : ".$tgl_awal, "Tanggal Akhir : ".$tgl_akhir]);
        $cetak_kegiatan = Kegiatan::whereBetween('tgl_keg',[$tgl_awal, $tgl_akhir])->latest()->get();
        return view('kegiatan.cetak_pertanggal',['kegiatan'=>$cetak_kegiatan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kegiatan.tambah');
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
            'tgl_keg' => 'required',
            'keg' => 'required',
            'ket' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('image'), $imageName);

        $kegiatan = new Kegiatan;
        
        $kegiatan->tgl_keg = $request->tgl_keg;
        $kegiatan->keg = $request->keg;
        $kegiatan->ket = $request->ket;
        $kegiatan->gambar = $imageName;

        $kegiatan->save();

        return redirect('/kegiatan');
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
        $kegiatan = Kegiatan::find($id);

        return view('kegiatan.edit',['kegiatan' => $kegiatan]);
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
            'tgl_keg' => 'required',
            'keg' => 'required',
            'ket' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $kegiatan = Kegiatan::find($id);

        if($request->has('gambar')){
            $path = "public/image";
            File::delete($path . $kegiatan->gambar);
            $imageName = time().'.'.$request->gambar->extension();    
            $request->gambar->move(public_path('image'), $imageName);    
            $kegiatan->gambar = $imageName;
        }
        
        $kegiatan->tgl_keg = $request['tgl_keg'];
        $kegiatan->keg = $request['keg'];
        $kegiatan->ket = $request['ket'];

        $kegiatan->save();

        return redirect('/kegiatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kegiatan = Kegiatan::find($id);
        $kegiatan->delete();

        $path = "image/";
        File::delete($path . $kegiatan->gambar);

        return redirect('/kegiatan');
    }
}
