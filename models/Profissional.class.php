<?php
	class Profissional
	{
		public function __construct(private int $id_profissional = 0, private string $nome = "", private string $imagem = "", private int $id_barbearia = 0){}
		
		public function getId_profissional()
		{
			return $this->id_profissional;
		}

		public function setId_profissional($id_profissional)
		{
			$this->id_profissional = $id_profissional;
		}

		public function getNome()
		{
			return $this->nome;
		}

		public function getImagem()
		{
			return $this->imagem;
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