<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuartu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nu_kuartu',
        'tipu_kuartu',
    ];
}
