<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veterinary extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'crv',
        'address',
        'zip_code',
        'state',
        'city'
    ];
    
   
}
