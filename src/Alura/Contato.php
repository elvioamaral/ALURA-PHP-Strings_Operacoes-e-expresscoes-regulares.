<?php

namespace App\Alura;

class Contato
{
    private $email;
    private $endereco;
    private $cep;
    private $telefone;

    public function __construct(string $email, string $endereco, string $cep, string $telefone)
    {
        $this->email = $email;
        if ($this->validaEmail($email) !== false) {
            $this->setEmail($email);
        } else {
            $this->setEmail("Email inválido.");
        }

        $this->endereco = $endereco;
        $this->cep = $cep;
        if ($this->validaTelefone($telefone)) {
            $this->setTelefone($telefone);
        } else {
            $this->setTelefone("Telefone inválido.");
        }
    }

    private function validaTelefone(string $telefone): int
    {
        return preg_match('/^[0-9]{4}-[0-9]{4}$/', $telefone, $validados);
    }

    public function getUsuario(): string
    {
        $posString = strpos($this->email, "@");

        if (!$posString) {
            return "Usuário inválido.";
        }

        return substr($this->email, 0, $posString);
    }

    private function validaEmail(string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    private function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getEnderecoCep(): string
    {
        $enderecoCep = [$this->endereco, $this->cep];
        return implode(", ", $enderecoCep);
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    private function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }
}
