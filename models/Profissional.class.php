<?php
	class Profissional
	{
		public function __construct(private int $id_profissional = 0, private string $nome = "", private string $imagem = "", private string $id_barbearia = ""){}
		
		public function getId_profissional()
		{
			return $this->id_profissional;
		}

		public function getNome()
		{
			return $this->nome;
		}

		public function getImagem()
		{
			return $this->imagem;
		}

		public function getId_barbearia()
		{
			return $this->id_barbearia;
		}

	}
?>