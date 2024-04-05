<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aldeia extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nrn_aldeia',
        'id_suku'
    ];

}

