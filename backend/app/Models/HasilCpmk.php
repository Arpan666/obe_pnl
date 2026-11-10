<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilCpmk extends Model
{
    protected $table = 'hasil_cpmk';
    protected $fillable = ['peserta_kuliah_id', 'cpmk_id', 'nilai_cpmk', 'is_tuntas'];
}