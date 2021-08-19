<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tabla_archivo extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
      'descripcion',
      'autor',
      'palabrasclave',
      'tematica',
      'tipo_cat',
      'op_disponible',
      'estatus',
      'id_admin',
      'id_archivo',
      'url',
      'idusuario',
    ];}
   
