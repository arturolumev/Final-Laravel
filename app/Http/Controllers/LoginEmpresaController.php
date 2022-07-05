<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http; // NECESARIO PARA EL API
use App\Models\User;

class LoginEmpresaController extends Controller
{
    public function login (Request $request) {
        $email = User::where('ruc', $request->ruc)->where('email', $request->email)->first();

        if (Hash::check($request->password, $email->password)) {
            return response([
                'mensaje' => 'Usuario validado correctamente',
                'email' => $email
            ]);
        }
        else {
            return response([
                'mensaje' => 'Email o clave incorrecto',
            ]);
        }
    }

    public function register(Request $request)
    {
        //dd($request);
        $usuario = new User();
        $usuario->nombreEmpresa = $request->nombreEmpresa;
        $usuario->ruc = $request->ruc;
        $usuario->nombreEncargado = $request->nombreEncargado;
        $usuario->apellidoEncargado = $request->apellidoEncargado;
        $usuario->email = $request->email;
        $usuario->tipo = $request->tipo;
        $usuario->password = Hash::make($request->password); // VERIFICAR SI FUNCIONA
        $usuario->save();
        if ($usuario) {
            return response([
                'mensaje' => 'Usuario registrado correctamente',
                'email' => $usuario->email
            ]);
        }
        else {
            return response([
                'mensaje' => 'No se ha registrado',
            ]);
        }
    }


}
