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
        $this->view = new Engine(__DIR__ . "/../View", "php");
    }

    public function inicio($data)
    {

        $list = (new Paciente())->find()->fetch(true);
        echo $this->view->render("paciente", [
            "pacientes" => $list,
            "title" => "Paciente"
        ]);

    }

    public function cadastro($data)
    {
        //var_dump($data);

        $user = new Paciente();
        $user->nome = $data["nome"];
        $user->idade = $data["idade"];
        $user->cpf = $data["cpf"];
        $user->peso = $data["peso"];
        $user->altura = $data["alt"];
        $user->hd = $data["hd"];
        $user->ac = $data["ac"];
        $user->observacao = $data["obs"];
        //var_dump($user);
        $userId = $user->save();
        //echo $userId;
        header("Location: ".ROOT."paciente");
    }

}