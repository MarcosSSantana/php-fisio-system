<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use PDO;

class User extends DataLayer
{
    public function __construct()
    {
        parent::__construct("user", ["nome"], "id", true);
    }

    public function enderecos()
    {
        return (new Endereco())->find("user_id = :uid", "uid={$this->id}")->fetch(true);
    }
}