<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataWorker extends Model
{
    use HasFactory;

    protected $table = 'tn_user_datos_trabajador';

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_categoria');
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class, 'id_especialidad');
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class, 'id_experiencia');
    }
}
