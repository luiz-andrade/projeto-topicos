<?php

namespace App\Http\Controllers;

use App\Models\PropostaTcc;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;


class WelcomeController extends Controller
{
    public function getIndex()
    {
        if (Auth::user()->tipo === 'aluno') {
            $usuario     = Auth::user()->email;
        }

        //dd($usuario);
        //$dados = PropostaTcc::all();

        $dados = PropostaTcc::where('usuario', 'like', "%".$usuario."%")->get();

        return view ('welcome', compact('dados'));
    }

    public function postAdicionar()
    {
        $dadosFormulario= Input::all();

        dd($dadosFormulario);

        return "Adicionando..";
    }
}
