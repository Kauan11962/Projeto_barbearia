<?php

require_once "../models/BarbeariaDAO.class.php";

	class profissionalDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		//Este método retorna todos os registros da tabela profissional.
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

		//Este método insere um novo profissional na tabela profissional.
		public function inserir($profissional)
		{
			$sql = "INSERT INTO profissional (nome, imagem, id_barbearia) VALUES(?,?,?)";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $profissional->getNomePro());
				$stm->bindValue(2, $profissional->getImagemPro());
				$stm->bindValue(3, $profissional->getId_barbearia());
				$stm->execute();
				$this->db = null;
				return "Profissionais inseridos com sucesso";
			}
			catch(PDOException $e)
			{
				$this->db = null;
				echo $e->getMessage();
				echo $e->getCode();
				die();
			}
		}

		//Este método retorna todos os profissionais vinculados a uma barbearia específica com base no ID fornecido.
		public function buscarPorBarbearia($id_barbearia)
		{
			$sql = "SELECT * FROM profissional WHERE id_barbearia = :id_barbearia";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(':id_barbearia', $id_barbearia, PDO::PARAM_INT);
				$stm->execute();
				$this->db = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch (PDOException $e)
			{
				echo $e->getMessage();
				echo $e->getCode();
				die();
			}
		}

		
	}
?>