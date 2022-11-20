<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use PDO;

class Paciente extends DataLayer
{
    public function __construct()
    {
        parent::__construct("paciente", ["nome"], "id", true);
    }

}