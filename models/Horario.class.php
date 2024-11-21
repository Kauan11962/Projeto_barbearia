<?php
	class Horario
	{
		public function __construct(private int $id_horario = 0, private string $dia = "", private string $horario_abrir = "", private string $horario_fechar = "", private int $id_barbearia = 0){}
		
		public function getId_horario()
		{
			return $this->id_horario;
		}

		public function getDia()
		{
			return $this->dia;
		}

		public function getHorario_abrir()
		{
			return $this->horario_abrir;
		}

		public function getHorario_fechar()
		{
			return $this->horario_fechar;
		}

        public function getId_barbearia() {
            return $this->id_barbearia;
        }
	}
?>