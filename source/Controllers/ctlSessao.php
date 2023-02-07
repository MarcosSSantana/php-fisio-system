<?php

namespace Source\Controllers;

use League\Plates\Engine;
use Source\Models\Convenio;
use Source\Models\Paciente;
use Source\Models\Sessao;

class ctlSessao
{
    private $view;

    public function __construct()
    {
        if(empty($_SESSION['email'])){
            header("Location: ".ROOT."login");
        }
        $this->view = new Engine(__DIR__ . "/../View", "php");
    }

    public function inicio($data)
    {

        $pacienteList = (new Paciente())->find()->fetch(true);
        $sessoes = (new Sessao())->find()->fetch(true);

        $paciente = [];
        foreach ($pacienteList as $item){
            $paciente[$item->data->id] = $item->data;
        }
//        echo "<pre>";
//        print_r($paciente);
//        echo "</pre>";
        foreach ($sessoes as $key => $item){
            $list[$key]['id'] = $item->data->id;
            $list[$key]['created_at'] = $item->data->created_at;
            $list[$key]['idPaciente'] = $item->data->idPaciente;
            $list[$key]['paciente'] = $paciente[$item->data->idPaciente]->nome;
            $list[$key]['pa'] = $item->data->pa;
            $list[$key]['fc'] = $item->data->fc;
//            echo "<pre>";
//            print_r($paciente[$item->data->idPaciente]);
//            echo "</pre>";
        }



//        $list = (new Sessao())->find()->fetch(true);

        echo $this->view->render("sessao", [
            "sessoes" => $list,
            "title" => "Sessões"
        ]);

    }

    public function list($dados){
        $id = $dados["id"];
        $list = (new Sessao())->findById($id);
        echo json_encode($list->data);
    }

    public function cadastro($data)
    {
        $id = $data["id"];
        if(empty($id)){
            $sessao = new Sessao();
        }else{
            $sessao = new Sessao();
            $sessao = $sessao->findById($id);
        }
        $sessao->idPaciente = $data["idPaciente"];
        $sessao->pa = $data["pa"];
        $sessao->fc = $data["fc"];
        $sessao->sp = $data["sp"];
        $sessao->ap = $data["ap"];
        $sessao->observacao = $data["observacao"];
//        echo "<pre>";
//        print_r($sessao);
//        echo "</pre>";

        $sessaoId = $sessao->save();
//        echo $sessaoId;
        header("Location: ".ROOT."sessao");
    }

}