<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosenMengajar extends Model
{
    protected $table = 'dosen_mengajar';
    protected $fillable = ['kelas_kuliah_id', 'dosen_id', 'is_koordinator'];
}