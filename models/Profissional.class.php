<?php
	class Profissional
	{
		public function __construct(private int $id_profissional = 0, private string $nome = "", private string $sobrenome = "", private string $imagem = ""){}
		
		public function getId_profissional()
		{
			return $this->id_profissional;
		}

		public function getNome()
		{
			return $this->nome;
		}

        public function getSobrenome()
		{
			return $this->sobrenome;
		}

		public function getImagem()
		{
			return $this->imagem;
		}

	}
?>