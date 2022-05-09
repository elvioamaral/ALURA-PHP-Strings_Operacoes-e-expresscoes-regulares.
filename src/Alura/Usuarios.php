<?php

namespace App\Alura;

class Usuarios
{
    private $nome;
    private $sobrenome;
    private $senha;
    private $tratamento;

    public function __construct(string $nome, string $senha, string $genero)
    {        
        $this->setSobrenome($nome);
        $this->validaSenha($senha);
        $this->tratamentoAoSobrenome($nome, $genero);
        
    }

    private function setSobrenome(string $nome)
    {
        $nomeSobrenome = explode(" ", $nome, 2);

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
        $size = strlen(trim($senha));

        if ($size < 6) {
            $this->senha = "Senha inválida.";
        }
    }

    private function tratamentoAoSobrenome(string $nome, string $genero)
    {
        if ($genero === 'M') {
            $this->tratamento = preg_replace('/^(\w+)\b/', 'Sr.', $nome, 1);
        } else {
            $this->tratamento = preg_replace('/^(\w+)\b/', 'Sra.', $nome, 1);
        }
    }

    public function getTratamento(): string
    {
        return $this->tratamento;
    }
}
