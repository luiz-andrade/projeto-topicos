<?php

namespace App\Http\Controllers;

use App\Models\PropostaTcc;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

use Auth;


class WelcomeController extends Controller
{
    public function getIndex()
    {
        $title = "Sistema de cadastro de Proposta TCC";

        if (Auth::user()->tipo === 'aluno') {
            $usuario     = Auth::user()->email;
        }

        //dd($usuario);
        //$dados = PropostaTcc::all();

        $dados = PropostaTcc::where('usuario', 'like', "%".$usuario."%")->get();

        return view ('welcome', compact('dados', 'title'));
    }

    public function postAdicionar()
    {
        $dadosFormulario= Input::all();

        dd($dadosFormulario);

        return "Adicionando..";
    }

}
