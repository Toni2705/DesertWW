<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = ['id','carrera_id', 'foto'];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
}
