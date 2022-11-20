<?php

namespace Source\Controllers;

use Source\Models\Convenio;
use Source\Models\Paciente;

class Main
{
    public function inicio($data)
    {
        echo "<h1>Inicio</h1>>";

        $list= (new Paciente())->find()->fetch(true);

        foreach ($list as $item) {
            print_r($item->nome);
        }

        $list= (new Convenio())->find()->fetch(true);

        foreach ($list as $item) {
            print_r($item->nome);
        }
    }

}