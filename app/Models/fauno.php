<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fauno extends Model
{
    use HasFactory;
    protected $fillable = [
        'fa1p1',
        'fa1p2',
        'idescenario',
      ];
}
