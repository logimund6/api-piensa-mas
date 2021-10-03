<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class escecoment extends Model
{
    use HasFactory;
    protected $fillable = [
        'idescenario',
        'comentario',
        'estado',

      ];
}
