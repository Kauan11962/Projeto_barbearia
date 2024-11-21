<?php
	class Servico
	{
		public function __construct(private int $id_servico = 0, private string $nome = "", private string $descricao = "", private string $tempo = "", private string $preco = ""){}
		
		public function getId_servico()
		{
			return $this->id_servico;
		}

		public function getNome()
		{
			return $this->nome;
		}

		public function getDescricao()
		{
			return $this->descricao;
		}

		public function getTempo()
		{
			return $this->tempo;
		}

		public function getPreco()
		{
			return $this->preco;
		}

	}
?>