<?php

namespace Source\Controllers;

use League\Plates\Engine;
use Source\Models\Convenio;
use Source\Models\Sessao;

class ctlSessao
{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../View", "php");
    }

    public function inicio($data)
    {
        $list = (new Sessao())->find()->fetch(true);
//        echo "<pre>";
//        print_r($list);
//        echo "</pre>";
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