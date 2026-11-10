<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiAsesmen extends Model
{
    protected $table = 'nilai_asesmen';
    protected $fillable = ['peserta_kuliah_id', 'komponen_asesmen_id', 'nilai_angka', 'catatan'];
}