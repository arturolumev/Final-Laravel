<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProyectosController extends Controller
{
    public function index()
    {
        $proyectos = HTTP::get('http://localhost:5000/proyectos');
        $proyectosArray = $proyectos -> json();

        return compact('proyectosArray');
    }
}
