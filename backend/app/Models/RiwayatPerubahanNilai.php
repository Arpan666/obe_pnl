<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPerubahanNilai extends Model
{
    protected $table = 'riwayat_perubahan_nilai';
    public $timestamps = false;
    protected $fillable = ['nilai_asesmen_id', 'updated_by', 'nilai_lama', 'nilai_baru', 'alasan_perubahan', 'created_at'];
}