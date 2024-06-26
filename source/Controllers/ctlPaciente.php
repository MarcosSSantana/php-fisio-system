<?php

namespace Source\Controllers;

use League\Plates\Engine;
use Source\Models\Convenio;
use Source\Models\Paciente;
use Source\Models\Sessao;

class ctlPaciente
{
    private $view;

    public function __construct()
    {
        if (empty($_SESSION['email'])) {
            header("Location: " . ROOT . "login");
        }
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

    public function list($dados)
    {
        $id = $dados["id"];
        //        $list = (new Paciente())->find("id = :id", "id=".$id)->fetch(true);
        $list = (new Paciente())->findById($id);
        //        foreach ($list as $item) {
        //            echo ($item);
        //        }
        //        print_r($list->data) ;
        echo json_encode($list->data);
    }

    public function listTotal()
    {
        $list = (new Paciente())->find()->fetch(true);
        $paciente = [];
        foreach ($list as $item) {
            $paciente[$item->data->id] = $item->data;
        }

        echo json_encode($paciente);
    }

    public function cadastro($data)
    {
        //var_dump($data);
        $id = $data["id"];
        if (empty($id)) {
            $user = new Paciente();
        } else {
            $user = new Paciente();
            $user = $user->findById($id);
        }
        $user->nome = $data["nome"];
        $user->sexo = $data["sexo"];
        $user->idade = $data["idade"];
        $user->cpf = $data["cpf"];
        $user->telefone = $data["telefone"];
        $user->peso = $data["peso"];
        $user->altura = $data["altura"];
        $user->imc = $data["imc"];
        $user->convenio = $data["convenio"];
        $user->hd = $data["hd"];
        $user->ac = $data["ac"];
        $user->observacao = $data["observacao"];
        //        echo "<pre>";
        //        print_r($user);
        //        echo "</pre>";

        $userId = $user->save();
        //        echo $userId;
        header("Location: " . ROOT . "paciente");
    }

    public function sessoes($dados)
    {
        $id = $dados["id"];
        $paciente = (new Paciente())->findById($id);
        $sessoes = (new Sessao())->find("idPaciente = :id", "id={$id}")->order("created_at ASC")->fetch(true);

        $dados['paciente'] = $paciente->data();
        foreach ($sessoes as $item) {
            $dados['sessoes'][] = $item->data();
        }

        echo $this->view->render("avaliacao", [
            "dados" => $dados,
            "title" => "Avaliação"
        ]);
        /*echo "<pre>";
        print_r($dados);
        echo "</pre>";*/
    }
}
