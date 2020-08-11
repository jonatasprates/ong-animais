<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'name',
        'image',
        'age',
        'specie',
        'blood',
        'note'
    ];
    
    public function newAnimal($request, $nameFile='')
    {
        $dataForm = $request->all();
        $dataForm['image'] = $nameFile;
        return $this->create($dataForm);
    }
    
    
    
    public function updateAnimal($request, $nameFile = '')
    {
        
        $data = $request->all();
        $data['image'] = $nameFile;
        
        return $this->update($data);
    }
   
}
