<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cpl extends Model
{
    protected $table = 'cpl';
    protected $fillable = ['kode_cpl', 'deskripsi', 'kategori', 'target_pencapaian', 'is_active'];
}