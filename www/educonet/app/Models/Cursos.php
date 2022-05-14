<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
   
    use HasFactory;

      protected $fillable = [
        'nombre','profesor','categoria','descripcion','duracion'
        ];
 

    public function profesores(){
        return $this->belongsTo(Profesores::class)->withTimestamps();
    } 

    public function users(){
        return $this ->belongsToMany(User::class,'curso_user');
    }

  
    
   
}
