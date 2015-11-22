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
        $hidden = '';

        if (Auth::user()->tipo === 'aluno') {
            $usuario = Auth::user()->email;
        }

        //dd($usuario);
        //$dados = PropostaTcc::all();

        $dados = PropostaTcc::where('usuario', 'like', "%".$usuario."%")->get();

        $status = $dados->lists('status');

        foreach($status as $item) {
            if($item === 'aguardando')
                $hidden= 'hidden';
        }

        return view('painel.index', compact('dados', 'status', 'hidden', 'usuario'));
    }

    public function getCadastrar()
    {
        return view('painel.cadastrar');
    }

    public function postCadastrar()
    {
        $dadosFormulario = Input::except('_token');

        //$ano = (Carbon::createFromFormat('d/m/Y', $dadosFormulario['ano'])->format('Y-m-d'));

        $validator = Validator::make($dadosFormulario, PropostaTcc::$rules, PropostaTcc::$messages);

        if($validator->fails()){
            return redirect('propostatcc/cadastrar')
                ->withErrors($validator)
                ->withInput();
        }else {
            $tcc = new PropostaTcc($dadosFormulario);

            $tcc->usuario = Auth::user()->email;
            $tcc->save();

            return redirect('propostatcc/');
        }
    }

    public function getEditar($id)
    {
        $proposta = PropostaTcc::find($id);

        return view("painel.editar", compact('proposta'));
    }

    public function postEditar($id)
    {
        $dadosFormulario = Input::all();

        $proposta = PropostaTcc::find($id);

        $validator = Validator::make($dadosFormulario, PropostaTcc::$rules, PropostaTcc::$messages);

        if($validator->fails()){
            return redirect('propostatcc/editar/'.$id)
                ->withErrors($validator)
                ->withInput();
        }else {

            $proposta->__construct($dadosFormulario);
            $proposta->save();

            return redirect('propostatcc/');
        }
    }

    public function getEnviar($id)
    {
        //$dadosFormulario = Input::all();
        $proposta = PropostaTcc::find($id);

        $proposta->status = 'aguardando';
        $proposta->save();

        return redirect('propostatcc/');
    }

    public function getPdf()
    {
        return "Pdf";
    }

}
