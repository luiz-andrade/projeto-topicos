<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PropostaTcc extends Model
{
    protected $table = 'proposta_tccs';

    protected $dates = ['ano'];

    public static $rules=[
        'nome'                 => 'required',
        'ano'                  => 'required',
        /*'titulo'               => 'required',
        'subtitulo'            => 'required',
        'local'                => 'required',

        'finalidade'           => 'required',
        'objetivos'            => 'required',
        'problematizacao'      => 'required',
        'delimitacao'          => 'required',
        'objetivo_geral'       => 'required',
        'objetivo_especifico'  => 'required',
        'justificativa'        => 'required',*/
    ];

    protected $fillable =[
        'nome',
        'orientador',
        'titulo',
        'subtitulo',
        'local',
        'ano',
        'finalidade',
        'objetivos',
        'problematizacao',
        'delimitacao',
        'objetivo_geral',
        'objetivo_especifico',
        'justificativa'
    ];

    public static $messages=[
        'nome.required'  => "O campo nome é obrigatório."
    ];

    //salva no banco de dados
    public function setAnoAttribute($date)
    {
        $this->attributes['ano'] = Carbon::createFromFormat('d/m/Y', $date);
    }

    //envia pra view
    public function getAnoAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    public function getStatusAttribute($value){

        if($value == 'aprovado'){
            $teste= "<span class='label label-success'>{$value}</span>";
        }else if($value == 'reprovado'){
            $teste= "<span class='label label-danger'>{$value}</span>";
        }else{
            $teste= "<span class='btn btn-xs btn-warning'>{$value}</span>";
        }

        return $teste;

    }
}
