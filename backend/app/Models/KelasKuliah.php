<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasKuliah extends Model
{
    protected $table = 'kelas_kuliah';
    protected $fillable = ['tahun_akademik_id', 'mata_kuliah_id', 'skema_penilaian_id', 'nama_kelas', 'kuota', 'status_penilaian'];
}