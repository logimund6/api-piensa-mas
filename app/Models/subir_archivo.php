<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subir_archivo extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
      'tipoarchivo',
      'tipocat',
      'id_usuario',
      'ruta_archivo'

    ];
}
