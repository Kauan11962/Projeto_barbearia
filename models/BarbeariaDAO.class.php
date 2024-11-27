<?php
class barbeariaDAO extends Conexao {

    // Método para verificar se a empresa já está cadastrada
    public function verificar($barbearia) {
        $sql = "SELECT * FROM barbearia WHERE cnpj = ? OR endereco = ?";
        $stm = $this->db->prepare($sql);  // Usando $this->db
        $stm->bindValue(1, $barbearia->getCnpj());
        $stm->bindValue(2, $barbearia->getEndereco());
        $stm->execute();

        // Se encontrar um registro, a empresa já existe
        return $stm->rowCount() > 0;
    }

    public function cadastrar($barbearia) {
        $this->db->beginTransaction(); // Inicia a transação
    
        try {
            // Cadastro da barbearia
            $sql = "INSERT INTO barbearia (nome, endereco, celular, cnpj, descricao, imagem, instagram, whatsapp, horario, id_dono) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $barbearia->getNome());
            $stm->bindValue(2, $barbearia->getEndereco());
            $stm->bindValue(3, $barbearia->getCelular());
            $stm->bindValue(4, $barbearia->getCnpj());
            $stm->bindValue(5, $barbearia->getDescricao());
            $stm->bindValue(6, $barbearia->getImagem());
            $stm->bindValue(7, $barbearia->getInstagram());
            $stm->bindValue(8, $barbearia->getWhatsapp());
            $stm->bindValue(9, $barbearia->getHorario());
            $stm->bindValue(10, $barbearia->getIdDono());
            $stm->execute();
    
            // Recuperar o ID da barbearia cadastrada
            $idBarbearia = $this->db->lastInsertId();          
    
            $this->db->commit(); // Confirma a transação

            return $idBarbearia;

            //return "Barbearia cadastrada com sucesso!";
        } catch (PDOException $e) {
            $this->db->rollBack(); // Reverte a transação em caso de erro
            return "Erro ao cadastrar barbearia: " . $e->getMessage();
        }
    }

    public function buscar_uma_barbearia($barbearia)
		{
			$sql = "SELECT * FROM barbearia WHERE idBarbearia = ?";
			try
			{
				$stm = $this->db->prepare($sql);
				$stm->bindValue(1, $barbearia->getIdBarbearia());
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

        public function alterar($barbearia)
        {
            // Prepara a consulta SQL para atualização
            $sql = "UPDATE barbearia SET 
                        nome = ?, 
                        endereco = ?, 
                        email = ?, 
                        cnpj = ?, 
                        descricao = ?, 
                        imagem = ?, 
                        instagram = ?, 
                        whatsapp = ?, 
                        horario = ? WHERE idBarbearia = ?";
        
            try {
                // Prepara o comando SQL para execução
                $stm = $this->db->prepare($sql);
        
                // Faz a associação dos valores nos respectivos índices
                $stm->bindValue(1, $barbearia->getNome());
                $stm->bindValue(2, $barbearia->getEndereco());
                $stm->bindValue(3, $barbearia->getEmail());
                $stm->bindValue(4, $barbearia->getCnpj());
                $stm->bindValue(5, $barbearia->getDescricao());
                $stm->bindValue(6, $barbearia->getImagem());
                $stm->bindValue(7, $barbearia->getInstagram());
                $stm->bindValue(8, $barbearia->getWhatsapp());
                $stm->bindValue(9, $barbearia->getHorario());
                $stm->bindValue(10, $barbearia->getIdBarbearia()); // O ID da barbearia
        
                // Executa o comando
                $stm->execute();
        
                // Fecha a conexão com o banco
                $this->db = null;
        
                // Retorna mensagem de sucesso
                return "Dados alterados com sucesso";
            } catch (PDOException $e) {
                // Fecha a conexão e exibe o erro
                $this->db = null;
                echo "Erro: " . $e->getMessage();
                echo "Código: " . $e->getCode();
                die();
            }
        }
        
    
    

    // Método para listar empresas com base no id_dono
    public function listarEmpresas($id_dono) {
        $sql = "
            SELECT 
                b.id_barbearia, b.nome AS nome_empresa, b.endereco, b.celular, b.cnpj, b.descricao, 
                b.imagem AS imagem_empresa, b.instagram, b.whatsapp, b.horario,
                p.nome AS nome_profissional, p.imagem AS imagem_profissional
            FROM barbearia b
            LEFT JOIN profissional p ON b.id_barbearia = p.id_barbearia
            WHERE b.id_dono = :id_dono
            ORDER BY b.nome
        ";
        
        $stmt = $this->db->prepare($sql);  // Usando $this->db para preparar a consulta
        $stmt->bindParam(':id_dono', $id_dono, PDO::PARAM_INT);  // Bind do parâmetro
        $stmt->execute();  // Executa a consulta
        return $stmt->fetchAll(PDO::FETCH_GROUP);  // Retorna os resultados agrupados
    }


    public function listarTodasEmpresas() {
        $sql = "
        SELECT barbearia.*, dono.nome AS nome_dono
        FROM barbearia
        INNER JOIN dono ON barbearia.id_dono = dono.id_dono;";
        $stmt = $this->db->prepare($sql);  
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function buscarBarbeariaPorId($idBarbearia)
    {
        $sql = "SELECT b.*, d.nome AS nome_dono 
                FROM barbearia b 
                INNER JOIN dono d ON b.id_dono = d.id_dono 
                WHERE b.id_barbearia = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $idBarbearia, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function excluirEmpresa(int $idBarbearia): bool {
        try {
            // Inicia a transação para garantir integridade
            $this->db->beginTransaction();
    
            // Primeiro, exclui os profissionais associados à barbearia
            $sqlProfissionais = "DELETE FROM profissional WHERE id_barbearia = :id_barbearia";
            $stmtProfissionais = $this->db->prepare($sqlProfissionais);
            $stmtProfissionais->bindValue(':id_barbearia', $idBarbearia, PDO::PARAM_INT);
            $stmtProfissionais->execute();
    
            // Agora, exclui a barbearia
            $sqlBarbearia = "DELETE FROM barbearia WHERE id_barbearia = :id_barbearia";
            $stmtBarbearia = $this->db->prepare($sqlBarbearia);
            $stmtBarbearia->bindValue(':id_barbearia', $idBarbearia, PDO::PARAM_INT);
            $stmtBarbearia->execute();
    
            // Commit a transação se tudo ocorrer bem
            $this->db->commit();
    
            return true;
        } catch (Exception $e) {
            // Em caso de erro, faz o rollback da transação
            $this->db->rollBack();
            // Lança a exceção
            throw new Exception("Erro ao excluir a empresa: " . $e->getMessage());
        }
    }
    

}
?>
