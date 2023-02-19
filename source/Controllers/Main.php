<?php

namespace Source\Controllers;

use League\Plates\Engine;
use Source\Models\Convenio;
use Source\Models\Paciente;
use Source\Models\Sessao;

class Main
{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../View", "php");
    }

    public function inicio($data)
    {
//        echo "<h1>Inicio</h1>";
        $pacientesMasc = (new Paciente())->find("sexo = :sexo","sexo=Masculino")->count();
        $pacientesFemi = (new Paciente())->find("sexo = :sexo","sexo=Feminino")->count();
        $pacientes = (new Paciente())->find()->count();
        $sessoes = (new Sessao())->find()->count();
        $list = "";//(new Paciente())->find()->fetch(true);
        echo $this->view->render("inicio", [
            "title" => "Inicio",
            "qtdPacientesMasc" => $pacientesMasc,
            "qtdPacientesFemi" => $pacientesFemi,
            "qtdPacientes" => $pacientes,
            "qtdSessoes" => $sessoes
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

    public function logar($data)
    {
//        echo "login";
//        echo "<pre>";
//        print_r($_SESSION);
//        echo "</pre>";
        echo $this->view->render("login", [
            "title" => "Login"
        ]);
//
    }

    public function login($data)
    {
        if($data['email']==="marinajgomes@hotmail.com" && $data['password']=== "abc123@@#"){
            $_SESSION['email'] = $data['email'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['nome'] = "Marina";
            header("Location: ".ROOT."paciente");
        }else{
            echo"Senha ou usuario errado";
            echo $this->view->render("login", [
                "title" => "Login"
            ]);
        }

    }

}