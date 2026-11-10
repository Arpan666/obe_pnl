<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkemaPenilaian extends Model
{
    protected $table = 'skema_penilaian';
    protected $fillable = ['nama_skema', 'jenis_mk', 'deskripsi', 'is_default'];

    public function komponen()
    {
        return $this->hasMany(KomponenSkemaPenilaian::class, 'skema_penilaian_id');
    }
}