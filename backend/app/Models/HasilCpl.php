<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilCpl extends Model
{
    protected $table = 'hasil_cpl';
    protected $fillable = ['mahasiswa_id', 'cpl_id', 'tahun_akademik_id', 'nilai_cpl', 'is_tuntas'];
}