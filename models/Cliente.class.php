<?php
	class Cliente
	{
		public function __construct(private int $idcliente = 0, private string $nome = "", private string $sobrenome = "",
        private string $email = "", private string $celular= "", private string $senha = ""){}
		
		public function getIdcliente()
		{
			return $this->idcliente;
		}

		public function getNome()
		{
			return $this->nome;
		}

        public function getSobrenome()
		{
			return $this->sobrenome;
		}

		public function getEmail()
		{
			return $this->email;
		}

        public function getCelular()
		{
			return $this->celular;
		}

		public function getSenha()
		{
			return $this->senha;
		}
	}
?>