<?php
	class donoDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public function login($dono)
		{
			$sql = "SELECT id_dono, nome FROM dono WHERE email = ? AND senha = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $dono->getEmail());
				$stm->bindValue(2, $dono->getSenha());
				$stm->execute();
				$this->db = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				$this->db = null;
				echo $e->getMessage();
				echo $e->getCode();
				die();
			}
		}

		public function cadastrar($dono)
		{
			$sql = "INSERT INTO dono (nome, sobrenome, email, celular, senha, cpf, data_nasc) VALUES (?,?,?,?,?,?,?)";
			try {
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $dono->getNome());
				$stm->bindValue(2, $dono->getSobrenome());
				$stm->bindValue(3, $dono->getEmail());
				$stm->bindValue(4, $dono->getCelular());
				$stm->bindValue(5, $dono->getSenha());
				$stm->bindValue(6, $dono->getCpf());
				$stm->bindValue(7, $dono->getData_nasc());
				$stm->execute();
			} catch (PDOException $e) {
				echo $e->getMessage();
				echo $e->getCode();
				die();
			}
		}

		public function verificar($dono)
		{
			$sql = "SELECT email, celular, cpf FROM dono WHERE email = ? OR celular = ? OR cpf = ?";
			
			try {
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $dono->getEmail());
				$stm->bindValue(2, $dono->getCelular());
				$stm->bindValue(3, $dono->getCpf());
				$stm->execute();
				return $stm->fetchAll(PDO::FETCH_OBJ);
			} catch (PDOException $e) {
				echo $e->getMessage();
				echo $e->getCode();
				die();
			}
		}

		public function buscar_um_dono($dono)
		{
			$sql = "SELECT * FROM dono WHERE id_dono = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $dono->getIddono());
				$stm->execute();
				$this->db = null;
				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(PDOException $e)
			{
				$this->db = null;
				echo $e->getMessage();
				echo $e->getCode();
				die();
			}
		}

		public function alterar($dono)
		{

			var_dump($dono);
			echo "<br>";

			$sql = "UPDATE dono SET nome = ?, sobrenome = ?, email = ?, celular = ?, senha = ?, cpf = ?, data_nasc = ?, imagem = ? WHERE id_dono = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $dono->getNome());
				$stm->bindValue(2, $dono->getSobrenome());
				$stm->bindValue(3, $dono->getEmail());
				$stm->bindValue(4, $dono->getCelular());
				$stm->bindValue(5, $dono->getSenha());
				$stm->bindValue(6, $dono->getCpf());
				$stm->bindValue(7, $dono->getData_nasc());
				$stm->bindValue(8, $dono->getImagem());
				$stm->bindValue(9, $dono->getIddono());

				$stm->execute();
				$this->db = null;
				return "Dados alterados com sucesso";
			}
			catch(PDOException $e)
			{
				$this->db = null;
				echo $e->getMessage();
				echo $e->getCode();
				die();
			}
		}
	}
?>