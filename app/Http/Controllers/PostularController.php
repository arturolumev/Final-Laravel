<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Postulante;

class PostularController extends Controller
{
    //
    public function postular(Request $request)
    {
        //dd($request);
        $postulacion = new Postulante();
        $postulacion->titulo_pry = $request->titulo_pry;
        $postulacion->descripcion_pry = $request->descripcion_pry;
        $postulacion->nombre = $request->nombre;
        $postulacion->email = $request->email;
        $postulacion->save();
        if ($postulacion) {
            return response([
                'mensaje' => 'Postulacion exitosa',
                'postulacion' => $postulacion->titulo_pry
            ]);
        }
        else {
            return response([
                'mensaje' => 'No se ha podido postular',
            ]);
        }
    }
}
