<?php
class Barbearia {
    public function __construct(
        private int $idBarbearia = 0,
        private string $nome = "",
        private string $endereco = "",
        private string $celular = "",
        private string $cnpj = "",
        private string $descricao = "",
        private string $imagem = "",
        private string $instagram = "",
        private string $whatsapp = "",
        private string $horario = "",
        //private string $profissional = [],
        //private string $servico = [],
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

    public function getCelular() {
        return $this->celular;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function getInstagram() {
        return $this->instagram;
    }

    public function getWhatsapp() {
        return $this->whatsapp;
    }

    public function getIdDono() {
        return $this->idDono;
    }

    public function getHorario() {
        return $this->horario;
    }

    public function getProfissional() {
        return $this->profissional;
    }

    public function getServico() {
        return $this->servico;
    }
}
?>
