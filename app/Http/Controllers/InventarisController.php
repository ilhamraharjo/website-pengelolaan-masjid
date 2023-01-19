<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;
use App\Models\Barang;

class InventarisController extends Controller
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
        $inventaris = Inventaris::orderBy('tgl_ivt','ASC')->paginate(4);
        return view('inventaris.index', ['inventaris'=>$inventaris]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('inventaris.tambah', ['barang'=>$barang]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        // Inventaris::create([
        //     'barang_id' => $request->barang_id,
        //     'tgl_ivt' => $request->tgl_ivt,
        //     'jumlah' => $request->jumlah,
        //     'ket_ivt' => $request->ket_ivt
        // ]);

        $request->validate([
            'barang_id' => 'required',
            'tgl_ivt' => 'required',
            'jumlah' => 'required',
            'ket_ivt' => 'required',
        ]);

        $inventaris = new Inventaris;

        $inventaris->barang_id = $request->barang_id;
        $inventaris->tgl_ivt = $request->tgl_ivt;
        $inventaris->jumlah = $request->jumlah;
        $inventaris->ket_ivt = $request->ket_ivt;

        $inventaris->save(); 

        return redirect('/inventaris'); 
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
        $inventaris = Inventaris::find($id);
        $barang = Barang::all();

        return view('inventaris.edit',['inventaris'=>$inventaris] ,['barang'=>$barang]);
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
            'barang_id' => 'required',
            'tgl_ivt' => 'required',
            'jumlah' => 'required',
            'ket_ivt' => 'required'
        ]);

        $inventaris = Inventaris::find($id);
        $inventaris->barang_id = $request['barang_id'];
        $inventaris->tgl_ivt = $request['tgl_ivt'];
        $inventaris->jumlah = $request['jumlah'];
        $inventaris->ket_ivt = $request['ket_ivt'];

        $inventaris->save();

        return redirect('/inventaris');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventaris = Inventaris::findorfail($id);
        $inventaris->delete();

        return redirect('/inventaris');
    }
}
