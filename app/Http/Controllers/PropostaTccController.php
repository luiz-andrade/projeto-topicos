<?php

namespace App\Http\Controllers;

use App\Models\PropostaTcc;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Auth;

class PropostaTccController extends Controller
{

    public function getIndex()
    {
        $usuario= '';

        if (Auth::user()->tipo === 'aluno') {
            $usuario = Auth::user()->email;
            
        }

        $dados = PropostaTcc::where('usuario', 'like', "%".$usuario."%")->get();

        // dd($dados);

        return view('painel.index', compact('dados'));
    }

    public function getCadastro()
    {
        return view('painel.cadastro');
    }

    public function postCadastro()
    {
        $dadosFormulario = Input::except('_token');

        ///$ano = (Carbon::createFromFormat('d/m/Y', $dadosFormulario['ano'])->format('Y-m-d'));

        $validator = Validator::make($dadosFormulario, PropostaTcc::$rules, PropostaTcc::$messages);

        if($validator->fails()){
            return redirect('propostatcc/cadastro')
                ->withErrors($validator)
                ->withInput();
        }else {
            $tcc = new PropostaTcc($dadosFormulario);

            $tcc->usuario = Auth::user()->email;
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
