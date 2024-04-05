<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nrn_postu',
        'id_munisipiu'
    ];
}
