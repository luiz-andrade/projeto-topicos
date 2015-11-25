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
        $usuario   = '';
        $hidden    = '';
        $disabled  = '';
        $btnEditar = "Devolver";

        if (Auth::user()->tipo === 'aluno') {
            $usuario     = Auth::user()->email;
            $btnEditar   = "Revisar";
            $hiddenAluno = '';
        }

        //dd($usuario);
        //$dados = PropostaTcc::all();

        $dados = PropostaTcc::where('usuario', 'like', "%".$usuario."%")->get();

        if(empty($dados)){
            dd($dados);
        }

        $status = $dados->lists('status');

        foreach($status as $item) {
            switch($item){
                case 'aprovado':    $hidden      = 'hidden';   break;
                case 'reprovado':   $hidden      = 'hidden';   break;
                case 'revisar':     $disabled    = 'disabled'; break;
                case 'aguardando':  $hiddenAluno = 'hidden';   break;
            }
        }

        return view('painel.index', compact(
            'dados',
            'status',
            'hidden',
            'usuario',
            'btnEditar',
            'disabled',
            'hiddenAluno'));
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
        $situacao = Input::get('situacao');

        switch($situacao){
            case '0': $status = 'aprovado'; break;
            case '1': $status = 'reprovado'; break;
            case '2': $status = 'revisar'; break;
            case '3': $status = 'aguardando'; break;
        }

        $proposta = PropostaTcc::find($id);

        $proposta->status = $status;
        $proposta->save();

        return redirect('propostatcc/');
    }

    public function getShow($id){

        $dados = PropostaTcc::find($id);

        return view('painel.show');

    }

    public function getPdf($id)
    {
        $proposta = PropostaTcc::find($id);
        $ano = Carbon::createFromFormat('d/m/Y', $proposta->ano)->format('Y');

//        dd($ano);
        //$data['items'] = $proposta;

        //dd($proposta);
//        $dt_inicio= Carbon::createFromFormat('d/m/Y', Input::get('dt_inicio'))->format('Y-m-d');
//        $dt_fim   = Carbon::createFromFormat('d/m/Y', Input::get('dt_fim'))->format('Y-m-d');
        $title = 'Proposta de TCC';

        $date    = date('d/m/Y H:m:s');
        $empresa = 'CENTRO UNIVERSITÁRIO LUTERANO DE JI-PARANÁ';
        $view    =  \View::make('painel.propostatcc-pdf', compact('date','empresa', 'proposta', 'title', 'ano'))->render();
        $pdf     = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream($title.'.pdf');
        //return $pdf->download($title.'.pdf');//para baixar o arquivo
    }

}
