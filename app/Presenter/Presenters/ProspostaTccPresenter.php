<?php

namespace App\Presenter\Presenters;

use App\Presenter\BasePresenter;

class PropostaTccPresenter extends BasePresenter{

    /*FORMATA A DATA NA INDEX*/

    public function statusAtivo()
    {
        switch($this->status){
            case 'aguardando' : $status = $this->status;
                break;
            case 'aprovado' : $status = $this->status;
                break;
            case 'reprovado' : $status = $this->status;
                break;
            case 'revisar' : $status = $this->status;
                break;
        }

        return $status;

    }
}