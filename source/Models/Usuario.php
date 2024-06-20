<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use PDO;

class Usuario extends DataLayer
{
    public function __construct()
    {
        parent::__construct("usuario", ["email", "senha"], "id", true);
    }

}