<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Request;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{

    protected $redirectPath = '/';

    protected $redirectTo = '/';

    protected $redirectAfterLogout = 'auth/login';

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }
/*
    public function getRegister()
    {

        //$orientador = User::where('tipo', 'coordenador')->lists('name', 'email');
        //dd($orientador);
        return view('auth.register', compact('orientador'));
    }
    */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
  /*  protected function create(array $data)
    {
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
*/
    public function postRegister()
    {
        $request = Input::except('_token');

        User::create([
            'name'     => $request['name'],
            'email'    => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        $this->Email($request['email'], $request['name']);

        return view('auth.login');
    }

    public function Email($email, $usuario)
    {

        //$usuario = 'aaa';
        //$email = 'luizz_andrade@hotmail.com';//$data['email'];

        $email2 = Mail::send('mail.resposta', ['situacao' => 'asd'], function($m) use ($email, $usuario){
            $m->from('luizgoncalves0@gmail.com', 'Novo Login de Acesso S304');
            $m->to('luizz_andrade@hotmail.com')->subject('Novo login de acesso ao S304 para aprovar');

            $m->cc($email, 'Obrigado por se registrar ')->subject($usuario. ' Aguarde resposta do administrador');
        });
    }
}
