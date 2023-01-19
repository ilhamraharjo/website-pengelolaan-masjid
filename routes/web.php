<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KasMasjidController;
use App\Http\Controllers\KasKeluarController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\JadwalKhotbahController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JamaahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard');
// });
Route::get('/master' , function(){
    return view('layout.master');
}); 

Route::group(['middleware' => 'pengurus'], function (){

//CRUD Kas Masuk
//create
Route::get('/KasMasuk/tambah',[KasMasjidController::class, 'create']);
Route::post('/KasMasuk', [KasMasjidController::class, 'store']);
//read KasMasuk
Route::get('/KasMasuk', [KasMasjidController::class, 'index']);
//update
Route::get('/KasMasuk/{id}/edit',[KasMasjidController::class, 'edit']);
Route::put('/KasMasuk/{id}',[KasMasjidController::class, 'update']);
//delete
Route::delete('/KasMasuk/{id}',[KasMasjidController::class, 'destroy']);

//CRUD Kas Keluar
Route::get('/KasKeluar/tambah',[KasKeluarController::class, 'create']);
Route::post('/KasKeluar', [KasKeluarController::class, 'store']);
//read KasKeluar
Route::get('/KasKeluar', [KasKeluarController::class, 'index']);
//update
Route::get('/KasKeluar/{id}/edit',[KasKeluarController::class, 'edit']);
Route::put('/KasKeluar/{id}',[KasKeluarController::class, 'update']);
//delete
Route::delete('/KasKeluar/{id}',[KasKeluarController::class, 'destroy']);

//CRUD Jadwal Khotbah
Route::get('/jadwalk/tambah',[JadwalKhotbahController::class, 'create']);
Route::post('/jadwalk', [JadwalKhotbahController::class, 'store']);
//update
Route::get('/jadwalk/{id}/edit',[JadwalKhotbahController::class, 'edit']);
Route::put('/jadwalk/{id}',[JadwalKhotbahController::class, 'update']);
//delete
Route::delete('/jadwalk/{id}',[JadwalKhotbahController::class, 'destroy']);
//cetak
Route::get('/jadwalk/cetak_jadwal', [JadwalKhotbahController::class, 'cetak']);
Route::get('/jadwalk/cetak_tgl', [JadwalKhotbahController::class, 'cetaktgl']);
Route::get('/jadwalk/cetak_pertanggal/{tgl_awal}/{tgl_akhir}', [JadwalKhotbahController::class, 'cetakPertgl']);

//CRUD kegiatan
Route::get('/kegiatan/tambah',[KegiatanController::class, 'create']);
Route::post('/kegiatan', [KegiatanController::class, 'store']);
//update
Route::get('/kegiatan/{id}/edit',[KegiatanController::class, 'edit']);
Route::put('/kegiatan/{id}',[KegiatanController::class, 'update']);
//delete
Route::delete('/kegiatan/{id}',[KegiatanController::class, 'destroy']);
//cetak
Route::get('/kegiatan/cetak_jadwal', [KegiatanController::class, 'cetak']);
Route::get('/kegiatan/cetak_tgl', [KegiatanController::class, 'cetaktgl']);
Route::get('/kegiatan/cetak_pertanggal/{tgl_awal}/{tgl_akhir}', [KegiatanController::class, 'cetakPertgl']);

//CRUD Barang
Route::get('/barang/tambah',[BarangController::class, 'create']);
Route::post('/barang', [BarangController::class, 'store']);
//read
Route::get('/barang',[BarangController::class, 'index']);
//update
Route::get('/barang/{id}/edit',[BarangController::class, 'edit']);
Route::put('/barang/{id}',[BarangController::class, 'update']);
//delete
Route::delete('/barang/{id}',[BarangController::class, 'destroy']);

//CRUD Inventaris
Route::get('/inventaris/tambah',[InventarisController::class, 'create']);
Route::post('inventaris', [InventarisController::class, 'store']);
//update
Route::get('/inventaris/{id}/edit',[InventarisController::class, 'edit']);
Route::put('/inventaris/{id}',[InventarisController::class, 'update']);
//delete
Route::delete('/inventaris/{id}',[InventarisController::class, 'destroy']);

// Rekap
//cetak
Route::get('/rekap/cetak_kas', [RekapController::class, 'cetak']);
Route::get('/rekap/cetak_tgl', [RekapController::class, 'cetaktgl']);
Route::get('/rekap/cetak_pertanggal/{tgl_awal}/{tgl_akhir}', [RekapController::class, 'cetakPertgl']);

});

Route::group(['middleware' => 'jamaah'], function (){

});



//read JadwalKhotbah
Route::get('/jadwalk', [JadwalKhotbahController::class, 'index']);
//read rekap kas
Route::get('/rekap',[RekapController::class, 'index']);
//read inventarsi
Route::get('/inventaris',[InventarisController::class, 'index']);
//read kegiatan
Route::get('/kegiatan',[KegiatanController::class, 'index']);
//dashboard
Route::get('/dashboard',[DashboardController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/' , function(){
    return view('jamaah');
}); 
Route::get('/',[JamaahController::class, 'kegiatan']);
// Route::get('/',[JamaahController::class, 'kegiatantes']);

// Route::get('/',[JamaahController::class, 'rekap']);