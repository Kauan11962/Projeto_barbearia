<?php
	class clienteDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public function login($cliente)
		{
			$sql = "SELECT id_cliente, nome FROM cliente WHERE email = ? AND senha = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $cliente->getEmail());
				$stm->bindValue(2, $cliente->getSenha());
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

		public function cadastrar($cliente)
		{
			$sql = "INSERT INTO cliente (nome, sobrenome, email, celular, senha) VALUES (?,?,?,?,?)";
			try {
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $cliente->getNome());
				$stm->bindValue(2, $cliente->getSobrenome());
				$stm->bindValue(3, $cliente->getEmail());
				$stm->bindValue(4, $cliente->getCelular());
				$stm->bindValue(5, $cliente->getSenha());
				$stm->execute();
			} catch (PDOException $e) {
				echo $e->getMessage();
				echo $e->getCode();
				die();
			}
		}

		public function verificar($cliente)
		{
			$sql = "SELECT email, celular FROM cliente WHERE email = ? AND celular = ?";
			
			try {
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $cliente->getEmail());
				$stm->bindValue(2, $cliente->getCelular());
				$stm->execute();
				return $stm->fetchAll(PDO::FETCH_OBJ);
			} catch (PDOException $e) {
				echo $e->getMessage();
				echo $e->getCode();
				die();
			}
		}
	}
?>