<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesertaKuliah extends Model
{
    protected $table = 'peserta_kuliah';
    protected $fillable = ['kelas_kuliah_id', 'mahasiswa_id', 'nilai_akhir_angka', 'nilai_akhir_huruf', 'bobot_akhir_angka', 'status_lulus'];
}