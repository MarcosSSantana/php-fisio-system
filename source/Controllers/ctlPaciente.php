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

    public function list($dados){
        $id = $dados["id"];
//        $list = (new Paciente())->find("id = :id", "id=".$id)->fetch(true);
        $list = (new Paciente())->findById($id);
//        foreach ($list as $item) {
//            echo ($item);
//        }
//        print_r($list->data) ;
        echo json_encode($list->data);
    }

    public function cadastro($data)
    {
        //var_dump($data);
        $id = $data["id"];
        if(empty($id)){
            $user = new Paciente();
        }else{
            $user = new Paciente();
            $user = $user->findById($id);
        }
        $user->nome = $data["nome"];
        $user->idade = $data["idade"];
        $user->cpf = $data["cpf"];
        $user->peso = $data["peso"];
        $user->altura = $data["altura"];
        $user->hd = $data["hd"];
        $user->ac = $data["ac"];
        $user->observacao = $data["obs"];
//        echo "<pre>";
//        print_r($user);
//        echo "</pre>";

        $userId = $user->save();
//        echo $userId;
        header("Location: ".ROOT."paciente");
    }

}