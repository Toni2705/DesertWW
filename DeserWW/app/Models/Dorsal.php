<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dorsal extends Model
{
    // use HasFactory;
    public function corredor()
    {
        return $this->belongsTo(Corredor::class, 'id_corredor');
    }


    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'id_carrera');
    }
}
