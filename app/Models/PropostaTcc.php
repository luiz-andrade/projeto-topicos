<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropostaTcc extends Model
{
    protected $table = 'proposta_tccs';

    public static $rules=[
        //'nome'                 => 'required',
        'titulo'               => 'required',
        'subtitulo'            => 'required',
        'local'                => 'required',
        'ano'                  => 'required',
        'finalidade'           => 'required',
        'objetivos'            => 'required',
        'problematizacao'      => 'required',
        'delimitacao'          => 'required',
        'objetivo_geral'       => 'required',
        'objetivo_especifico'  => 'required',
        'justificativa'        => 'required',
    ];

    protected $fillable =[
        'nome'                 => 'required',
        'titulo'               => 'required',
        'subtitulo'            => 'required',
        'local'                => 'required',
        'ano'                  => 'required',
        'finalidade'           => 'required',
        'objetivos'            => 'required',
        'problematizacao'      => 'required',
        'delimitacao'          => 'required',
        'objetivo_geral'       => 'required',
        'objetivo_especifico'  => 'required',
        'justificativa'        => 'required',
    ];

    public static $messages=[
        'nome.required'  => "O campo nome � obrigat�rio."
    ];
}
