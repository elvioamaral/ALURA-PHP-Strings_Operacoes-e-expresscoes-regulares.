<?php

namespace App\Alura;

class Usuarios
{
    private $nome;
    private $sobrenome;
    private $senha;

    public function __construct(string $nome, string $senha)
    {
        $nomeSobrenome = explode(" ", $nome, 2);

        $this->senha = $senha;
        $this->validaSenha($senha);

        if ($nomeSobrenome[0] === "") {
            $this->nome = 'Nome Inválido';
        } else {
            $this->nome = $nomeSobrenome[0];
        }

        if ($nomeSobrenome[1] === null) {
            $this->sobrenome = 'Sobrenome Inválido';
        } else {
            $this->sobrenome = $nomeSobrenome[1];
        }
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getSobrenome(): string
    {
        return $this->sobrenome;
    }
    
    public function getSenha(): string
    {
        return $this->senha;
    }

    private function validaSenha(string $senha): void
    {
        $size = strlen($senha);

        if ($size < 6) {
            $this->senha = "Senha inválida.";
        }
    }
}
