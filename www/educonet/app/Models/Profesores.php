<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesores extends Model
{

    use HasFactory;
    protected $fillable = [
        'nombre','apellido','correo','telefono',
        ];
  
    public function recursos(){
        return $this->hasMany(Recursos::class)->withTimestamps();
    }  

     public function cursos(){
        return $this->hasMany(Cursos::class)->withTimestamps();
    }  
    
    
}
