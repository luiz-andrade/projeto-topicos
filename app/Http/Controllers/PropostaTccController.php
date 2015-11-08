<?php

namespace App\Http\Controllers;

use App\Models\PropostaTcc;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class PropostaTccController extends Controller
{

    public function getIndex()
    {
        $dados = PropostaTcc::all();
        return view('painel.index', compact('dados'));
    }

    public function getCadastro()
    {
        return view('painel.cadastro');
    }

    public function postCadastro()
    {
        $dadosFormulario = Input::except('_token');

        $validator = Validator::make($dadosFormulario, PropostaTcc::$rules, PropostaTcc::$messages);

        if($validator->fails()){
            return redirect('propostatcc/cadastro')
                ->withErrors($validator)
                ->withInput();
        }else {
            $tcc = new PropostaTcc($dadosFormulario);
            $tcc->save();

            return redirect('propostatcc/');
        }
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
