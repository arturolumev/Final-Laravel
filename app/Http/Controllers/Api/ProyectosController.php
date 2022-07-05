<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProyectosController extends Controller
{
    public function get()
    {
        $proyectos = HTTP::get('http://localhost:5000/proyectos');
        $proyectosArray = $proyectos -> json();

        return compact('proyectosArray');
    }

    public function add(Request $request)
    {
        $proyectos = HTTP::post('http://localhost:5000/proyecto', [
            'titulo_pry' => $request->titulo_pry,
            'descripcion_pry' => $request->descripcion_pry,
            'requisitos_pry' => $request->requisitos_pry,
            'pago_pry' => $request->pago_pry,
            'vacantes_pry' => $request->vacantes_pry,
        ]);

        return $proyectos;
    }
}
