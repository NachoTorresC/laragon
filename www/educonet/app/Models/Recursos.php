<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recursos extends Model
{
    use HasFactory;

      protected $fillable = [
        'nombre','autor','categoria','descripcion','id_profesores','Imagen'
        ];

    public function profesores(){
        return $this->belongsTo(Profesores::class)->withTimestamps();
    }  

    public function users(){
        return $this ->belongsToMany(User::class,'recurso_user');
    }
    


}
