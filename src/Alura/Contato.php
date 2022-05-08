<?php

namespace App\Alura;

class Contato
{
    private $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function getUsuario(): string
    {
        $posString = strpos($this->email, "@");

        if (!$posString) {
            return "Usuário inválido.";
        }

        return substr($this->email, 0, $posString);
    }
}
