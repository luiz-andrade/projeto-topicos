<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PropostaTccController extends Controller
{

    public function getIndex()
    {
        return view('painel.index');
    }

    public function getCadastro()
    {
        return view('painel.cadastro');
    }

    public function postCadastro()
    {
        $dadosFormulario = Input::all()
        return view('painel.cadastro');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }
}
