<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $timestamp = false;
    protected $table = 'inventaris';

    protected $fillable = ['barang_id','jumlah','tgl_ivt','ket_ivt'];
    // protected $dates = ['tgl_ivt'];

    public function barang()
    {
        return $this->belongsTo('App\Models\Barang','barang_id');
    }
}
