<?php

namespace App\Http\Controllers;

use App\Models\MensagemDados;
use App\Models\PropostaTcc;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Auth;
use Laracasts\Flash\Flash;

class PropostaTccController extends Controller
{

    public function getIndex()
    {
        $title = "Listagem de Proposta TCC";
        $usuario   = '';
        $hidden    = '';
        $disabled  = '';
        $btnEditar = "Devolver";

        if (Auth::user()->tipo === 'aluno') {
            $usuario     = Auth::user()->email;
            $btnEditar   = "Revisar";
            $hiddenAluno = '';
        }

        $dados = PropostaTcc::where('usuario', 'like', "%".$usuario."%")->get();

        //dd($dados);

        $status = $dados->lists('status');

        //if(!$dados->isEmpty()) //verifica objeto vazio

        foreach($status as $item) {
            switch($item){
                case 'aprovado':    $hidden      = 'hidden';   break;
                case 'reprovado':   $hidden      = 'hidden';   break;
                case 'revisar':     $disabled    = 'disabled'; break;
                case 'aguardando':  $hiddenAluno = 'hidden';   break;
            }

            //dd($item);
        }

        return view('painel.index', compact(
            'title',
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
        $title = "Cadastrar nova Proposta TCC";

        return view('painel.cadastrar', compact('title'));
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
        $title = "Editar Proposta TCC";

        $proposta = PropostaTcc::find($id);

        $mensagem = MensagemDados::where('id_proposta', $id)->get();//->lists('mensagem', 'created_at');

        //dd($mensagem);

        return view("painel.editar", compact('proposta', 'title', 'mensagem'));
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

            //dd($proposta);

            if($proposta->update($dadosFormulario)){
                Flash::success('Registro alterado com sucesso.');

                $this->email('aguardando');
            }

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

        //dd($user);
/*
            Mail::send('emails.contato', $data, function($message) {
                $message->from(Input::get('email'), Input::get('nome'));
                $message->to('contato@billjr.com.br') ->subject('Contato Bill Jr.');
            });*/
        //}
        $proposta = PropostaTcc::find($id);

        $proposta->status = $status;
        if($proposta->save()){
            flash()->success('You have been logged out.');
        }

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

        $title = 'Proposta de TCC';

        $date    = date('d/m/Y H:m:s');
        $empresa = 'CENTRO UNIVERSITÁRIO LUTERANO DE JI-PARANÁ';
        $view    =  \View::make('painel.propostatcc-pdf', compact('date','empresa', 'proposta', 'title', 'ano'))->render();
        $pdf     = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream($title.'.pdf');
        //return $pdf->download($title.'.pdf');//para baixar o arquivo
    }

    public function getContato()
    {
        $title = 'Contato';
        return view('painel.contato', compact('title'));
    }

    public function postIndex()
    {
        $dadosFormulario = Input::except('_token');

        dd($dadosFormulario);

        $id = Input::get('id_proposta');

        $proposta = PropostaTcc::find($id);

        $proposta->status = 'revisar';//$status;
        $proposta->save();

        if(MensagemDados::create($dadosFormulario)){
            Flash::sucess('Mensagem enviada para o aluno');

            $this->email('revisar');
        }

        return redirect()->back();

    }

    protected function email($status, $email)
    {
        /*
         * Aprovado-> envia email para o aluno
         * Reprovado-> envia email para o aluno
         * Revisar-> envia email para o aluno
         * Aguardando-> envia email para o professor
        */
        $user = Auth::user();
        //$user = 'luizgoncalves0@gmail.com';

        $user->email = 'luizz_andrade@hotmail.com'; //email para testar
        //dd($user->email);

        Mail::send('mail.resposta', ['situacao' => 'asd'], function($m) use ($status, $user){
            $m->from('nao-responder@ulbra.edu.br', 'Coordenador de TCC');

            $m->to($user->email)->subject('PROPOSTA-TCC-Mudança de status da proposta('.$status.')');
        });

    }

}
