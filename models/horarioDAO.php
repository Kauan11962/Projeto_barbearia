<?php
	class horarioDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public function inserir($horario)
		{
			$sql = "INSERT INTO horario (dia, horario_abrir, horario_fechar, id_barbearia) VALUES(?,?,?,?)";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $horario->getDia());
				$stm->bindValue(2, $horario->getHorario_abrir());
				$stm->bindValue(3, $horario->getHorario_fechar());
				$stm->bindValue(4, $horario->getId_barbearia());
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