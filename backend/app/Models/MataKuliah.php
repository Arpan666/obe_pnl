<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliah';
    protected $fillable = ['kode_mk', 'nama_mk', 'sks_teori', 'sks_praktikum', 'sks_total', 'jenis_mk', 'semester_kurikulum', 'is_active'];
}