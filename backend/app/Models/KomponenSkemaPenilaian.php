<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KomponenSkemaPenilaian extends Model
{
    protected $table = 'komponen_skema_penilaian';
    protected $fillable = ['skema_penilaian_id', 'nama_komponen', 'bobot_persen'];
}