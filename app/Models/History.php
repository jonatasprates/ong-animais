<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class History extends Model
{
    protected $fillable = ['date', 'animal_id', 'vetenary_id', 'note'];
    
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
	
    
    public function veterinary()
    {
        return $this->belongsTo(Veterinary::class, 'vetenary_id');
    }  
}
