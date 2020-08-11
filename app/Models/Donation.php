<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'name',
        'rg',
        'email',
        'fone',
        'cell_phone',
        'address',
        'zip_code',
        'state',
        'city',
        'type',
        'qty'
    ];
   
}
