<?php

namespace App\Presenter;

use Laracasts\Presenter\Presenter;

abstract class BasePresenter extends Presenter{

    public function createdAt(){
        //return $this->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d/m/Y H:i:s');
        return $this->created_at->format('d/m/Y H:i:s');
    }

    public function updatedAt(){
        return $this->updated_at->format('d/m/Y H:i:s');
    }

    public function statusSelecionado(){
        switch ($this->status) {
            case 'A' : $status = 'Ativo';   break;
            case 'I' : $status = 'Inativo'; break;
        }
        return $this->status= $status;
    }

}