<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subir_data extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
      'autor',
      'ruta',
      'palabrasclave',
      'tematica',
      'descripcion'
    ];
}
