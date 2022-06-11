<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function productList()
    {
        $cursos = Cursos::all();

        return view("shop.products", compact("cursos"));
    }
}
