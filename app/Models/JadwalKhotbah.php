<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKhotbah extends Model
{
    use HasFactory;

    protected $table = 'jadwal_khotbah';

    protected $fillable = ['tgl_khotbah','penceramah'];
    // protected $dates = ['tgl_khotbah'];
}
