<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model
{
    protected $table = 'tahun_akademik';
    protected $fillable = ['kode_ta', 'tahun_mulai', 'tahun_selesai', 'semester', 'is_active'];
}