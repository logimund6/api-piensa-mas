<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cat_universidade extends Model
{
    use HasFactory;
    protected $fillable = [
                 'code',
                 'descripcion',
                 'idpais',
                 'estado',
           
    ];
}
