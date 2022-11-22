<?php

namespace Source\Controllers;

use League\Plates\Engine;
use Source\Models\Convenio;
use Source\Models\Paciente;

class Main
{
    private $view;
    public function __construct()
    {
        $this->view = new Engine(__DIR__."/../View", "php");
    }

    public function inicio($data)
    {
//        echo "<h1>Inicio</h1>";

        $list= (new Paciente())->find()->fetch(true);
        echo $this->view->render("inicio", [
            "pacientes"=> $list
        ]);
//        foreach ($list as $item) {
//            print_r($item->nome);
//        }
//
//        $list= (new Convenio())->find()->fetch(true);
//
//        foreach ($list as $item) {
//            print_r($item->nome);
//        }
    }

}