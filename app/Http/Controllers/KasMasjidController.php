<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KasMasjid;

class KasMasjidController extends Controller
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
         $kas_masjid = KasMasjid::orderBy('tgl_kas','ASC')->where('jenis','=','masuk')->paginate(4);
         $sum_total = KasMasjid::where('jenis','=','masuk')->sum('masuk');
         return view('KasMasuk.index', compact('kas_masjid',  'sum_total'));
        //return view('KasMasuk.index',['kas_masjid'=>$kas_masjid]);
    }
    /*$kas_masjid = DB::table('kas_masjid')->get();
        //dd($kas);
        return view('KasMasuk.index', ['kas_masjid' => $kas_masjid]);
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('KasMasuk.tambah');
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
            'tgl_kas' => 'required',
            'uraian' => 'required',
            'masuk' => 'required',
            
        ]);
       /* DB::table('kas_masjid')->insert([
            'tgl_kas' => $request['tgl_kas'],
            'uraian' => $request['uraian'],
            'masuk' => $request['masuk']
        ]);*/

        $kas = new KasMasjid;
        
        $kas->tgl_kas = $request->tgl_kas;
        $kas->uraian = $request->uraian;
        $kas->masuk = $request->masuk;
        $kas->keluar = '0';
        $kas->jenis = 'masuk';
        $kas->save();

        return redirect('/KasMasuk');
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
        $kas_masjid = KasMasjid::find($id);

        return view('KasMasuk.edit',['kas_masjid' => $kas_masjid]);
    }

    /**
     * Update the specified resource in storage.
     * $kas_masjid = DB::table('kas_masjid')->where('id',$id)->first();
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tgl_kas' => 'required',
            'uraian' => 'required',
            'masuk' => 'required',
            
        ]);

       
                $kas_masjid = KasMasjid::find($id);

                $kas_masjid->tgl_kas = $request['tgl_kas'];
                $kas_masjid->uraian = $request['uraian'];
                $kas_masjid->masuk = $request['masuk'];
                
                $kas_masjid->save();

                return redirect('/KasMasuk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kas_masjid = KasMasjid::find($id);
        $kas_masjid->delete();

        return redirect('/KasMasuk');
    }
}
