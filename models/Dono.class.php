<?php
	class Dono
	{
		public function __construct(private int $iddono = 0, private string $nome = "", private string $sobrenome = "",
        private string $email = "", private string $celular= "", private string $senha = "", private string $cpf = "",
		private string $data_nasc = "", private string $imagem = ""){}
		
		public function getIddono()
		{
			return $this->iddono;
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

		public function getCpf()
		{
			return $this->cpf;
		}

		public function getData_nasc()
		{
			return $this->data_nasc;
		}

		public function getImagem()
		{
			return $this->imagem;
		}
	}
?>