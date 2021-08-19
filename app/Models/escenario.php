<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class escenario extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'nivel',
        'educacion',
        'tema',
        'palabras_clave',
        'estado',
        'idusuario',
        'ruta',
      ];

}
