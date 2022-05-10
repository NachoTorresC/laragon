<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recursos extends Model
{
    use HasFactory;

      protected $fillable = [
        'nombre','autor','categoria','descripcion'
        ];

    public function profesores(){
        return $this->belongsTo(Profesores::class)->withTimestamps();
    }  
    


}
