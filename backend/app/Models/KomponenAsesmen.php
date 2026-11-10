<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KomponenAsesmen extends Model
{
    protected $table = 'komponen_asesmen';
    protected $fillable = ['kelas_kuliah_id', 'cpmk_id', 'nama_asesmen', 'bobot_persen'];
}