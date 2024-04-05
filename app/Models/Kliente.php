<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kliente extends Model
{
    use HasFactory;
    
    protected $table = 'klientes';

    protected $fillable = [
        'id',
        'nrn_kliente',
        'hela_fatin',
        'id_aldeia',
        'id_kuartu',
        'data_checking',
        'data_checkout'
    ];

}
