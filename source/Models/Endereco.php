<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Endereco extends DataLayer
{
    public function __construct()
    {
        parent::__construct("endereco", ["user_id", "endereco"], "id", true);
    }

    public function add(User $user, string $endereco, int $numero, int $cep ):Endereco
    {
        $this->user_id = $user->id;
        $this->endereco = $endereco;
        $this->numero = $numero;
        $this->cep = $cep;

        return $this;
    }
}