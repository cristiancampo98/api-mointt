<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $table = 'tn_calificaciones';

    protected $fillable = ['puntuacion', 'observaciones', 'user_id', 'votante_id'];
}
