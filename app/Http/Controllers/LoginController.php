<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http; // NECESARIO PARA EL API

class LoginController extends Controller
{
    public function login (Request $request) {
        $email = User::where('email', $request->email)->where('password', $request->password)->first();
        if ($email) {
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
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = $request->password;
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
