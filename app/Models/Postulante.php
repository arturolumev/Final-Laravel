<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Postulante extends Eloquent
{
    use HasFactory;

    protected $fillable = [
        'titulo_pry',
        'descripcion_pry',
        'nombre',
        'email',
    ];
}
