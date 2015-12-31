<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class MensagemDados extends Model
{
    protected $table = 'mensagems';

    protected $primaryKey = 'id';

    protected $fillable= ['id_proposta', 'mensagem', 'usuario'];

    public function getCreatedAtAttribute($date)
    {
        return $data = Carbon::parse($date)->format('d/m/Y H:i:s');
        //$this->attributes['created_at'] = Carbon::createFromFormat('d/m/Y', $date);
    }
}
