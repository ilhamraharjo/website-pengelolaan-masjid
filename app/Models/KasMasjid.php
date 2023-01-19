<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasMasjid extends Model
{
    use HasFactory;

    protected $table = 'kas_masjid';

    protected $fillable = ['tgl_kas','uraian','masuk','keluar','jenis',];
    //protected $dates = ['tgl_kas'];
}
