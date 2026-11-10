<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CplMataKuliah extends Model
{
    protected $table = 'cpl_mata_kuliah';
    protected $fillable = ['cpl_id', 'mata_kuliah_id', 'bobot_kontribusi'];
}