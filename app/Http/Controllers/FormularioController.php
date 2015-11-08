<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

<<<<<<< HEAD
=======

>>>>>>> origin/master
class FormularioController extends Controller
{
    public function getIndex()
    {
<<<<<<< HEAD
        return view('formulario');
    }

=======
        return view ('formulario');
    }
>>>>>>> origin/master
    public function postAdicionar()
    {
        $dadosFormulario= Input::all();

        dd($dadosFormulario);

        return "Adicionando..";
    }
<<<<<<< HEAD
=======

>>>>>>> origin/master
}
