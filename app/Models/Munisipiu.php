<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Munisipiu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nrn_munisipiu',
        'id_nasaun'
    ];
}
