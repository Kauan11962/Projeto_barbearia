<?php
	class clienteDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}

		//Verifica as credenciais do cliente com base no e-mail e senha.
		public function login($cliente)
		{
			$sql = "SELECT id_cliente, nome, sobrenome FROM cliente WHERE email = ? AND senha = ?";
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

		//Insere um novo cliente no banco com os dados fornecidos
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
        
		//Verifica a existência de um cliente com o e-mail e celular fornecidos.
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

		//Busca todas as informações de um cliente pelo id_cliente.
		public function buscar_um_cliente($cliente)
		{
			$sql = "SELECT * FROM cliente WHERE id_cliente = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $cliente->getId_cliente());
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

		//Atualiza as informações de um cliente existente no banco de dados.
		public function alterar($cliente)
		{

			var_dump($cliente);
			echo "<br>";

			$sql = "UPDATE cliente SET nome = ?, sobrenome = ?, email = ?, celular = ?, senha = ?, preferencias = ?, imagem = ? WHERE id_cliente = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $cliente->getNome());
				$stm->bindValue(2, $cliente->getSobrenome());
				$stm->bindValue(3, $cliente->getEmail());
				$stm->bindValue(4, $cliente->getCelular());
				$stm->bindValue(5, $cliente->getSenha());
				$stm->bindValue(6, $cliente->getPreferencias());
				$stm->bindValue(7, $cliente->getImagem());
				$stm->bindValue(8, $cliente->getId_cliente());

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