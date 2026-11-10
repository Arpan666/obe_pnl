<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengesahanNilai extends Model
{
    protected $table = 'pengesahan_nilai';
    protected $fillable = ['kelas_kuliah_id', 'submitted_by', 'approved_by', 'status', 'catatan', 'submitted_at', 'approved_at'];
}