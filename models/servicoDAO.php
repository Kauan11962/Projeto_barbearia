<?php
	class servicoDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public function buscar_todas()
		{
			$sql = "SELECT * FROM servico";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->execute();
				$this->db = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
				echo $e->getCode();
				die();
			}
		}
		public function inserir($servico)
		{
			$sql = "INSERT INTO servico (nome, descricao, tempo, preco) VALUES(?,?,?,?)";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $servico->getNome());
				$stm->bindValue(2, $servico->getDescricao());
				$stm->bindValue(3, $servico->getTempo());
				$stm->bindValue(4, $servico->getPreco());
				$stm->execute();
				$this->db = null;
				return "Horários inseridos com sucesso";
			}
			catch(PDOException $e)
			{
				$this->db = null;
				echo $e->getMessage();
				echo $e->getCode();
				die();
			}
		}
	}//fim da classe
?>