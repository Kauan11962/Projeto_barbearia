<?php
class Profissional
{
    public function __construct(
        private int $id_profissional = 0,
        private string $nomePro = "",
        private string $imagemPro = "",
        private int $id_barbearia = 0
    ) {}

    public function getId_profissional()
    {
        return $this->id_profissional;
    }

    public function setId_profissional($id_profissional)
    {
        $this->id_profissional = $id_profissional;
    }

    public function getNomePro()
    {
        return $this->nomePro;
    }

    public function getImagemPro()
    {
        return $this->imagemPro;
    }

    public function setId_barbearia($id_barbearia)
    {
        $this->id_barbearia = $id_barbearia;
    }

    public function getId_barbearia()
    {
        return $this->id_barbearia;
    }
}
?>
