<?php
	class profissionalDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public function buscar_todas()
		{
			$sql = "SELECT * FROM profissional";
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
		public function inserir($profissional)
		{
			$sql = "INSERT INTO profissional (nome, imagem) VALUES(?,?)";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $profissional->getNome());
				$stm->bindValue(2, $profissional->getImagem());
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