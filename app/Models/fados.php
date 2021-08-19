<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fados extends Model
{
    use HasFactory;
    protected $fillable = [
        'fa2p1',
        'fa2p2',
        'fa2p3_1',
        'fa2p3_2',
        'fa2p3_3',
        'fa2p3_4',
        'fa2p3_5',
        'fa2p3_6',
        'fa2p3_7',
        'idescenario',
      ];
}
