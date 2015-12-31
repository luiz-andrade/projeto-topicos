<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MensagemController extends Controller
{

    public function getIndex()
    {
        $dadosFormulario = Input::all();
        dd($dadosFormulario);
    }

}
