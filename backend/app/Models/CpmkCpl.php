<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CpmkCpl extends Model
{
    protected $table = 'cpmk_cpl';
    protected $fillable = ['cpmk_id', 'cpl_id', 'bobot_kontribusi'];
}