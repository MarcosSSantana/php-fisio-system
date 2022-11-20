<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use PDO;

class Convenio extends DataLayer
{
    public function __construct()
    {
        parent::__construct("convenio", ["nome"], "id", true);
    }

}