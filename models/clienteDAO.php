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
	}
?>