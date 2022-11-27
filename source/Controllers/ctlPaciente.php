<?php

namespace Source\Controllers;

use League\Plates\Engine;
use Source\Models\Convenio;
use Source\Models\Paciente;

class ctlPaciente
{
    private $view;
    public function __construct()
    {
        $this->view = new Engine(__DIR__."/../View", "php");
    }

    public function inicio($data)
    {

        $list= (new Paciente())->find()->fetch(true);
        echo $this->view->render("paciente", [
            "pacientes"=> $list,
            "title"=> "Paciente"
        ]);

    }

    public function cadastro($data)
    {
    print_r($data);
    print_r($_POST);
    }

}