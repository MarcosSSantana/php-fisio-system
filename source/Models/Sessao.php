<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use PDO;

class Sessao extends DataLayer
{
    public function __construct()
    {
        parent::__construct("sessao", ["idPaciente"], "id", true);
    }

}