<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cpmk extends Model
{
    protected $table = 'cpmk';
    protected $fillable = ['mata_kuliah_id', 'kode_cpmk', 'deskripsi', 'target_pencapaian'];
}