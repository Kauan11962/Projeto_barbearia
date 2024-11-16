<?php
class Barbearia {
    public function __construct(
        private int $idBarbearia = 0,
        private string $nome = "",
        private string $endereco = "",
        private string $telefone = "",
        private int $idDono = 0
    ) {}

    public function getIdBarbearia() {
        return $this->idBarbearia;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getIdDono() {
        return $this->idDono;
    }
}
?>
