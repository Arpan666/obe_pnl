<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkalaNilai extends Model
{
    protected $table = 'skala_nilai';
    protected $fillable = ['nilai_huruf', 'min_angka', 'max_angka', 'bobot_angka', 'predikat'];
}