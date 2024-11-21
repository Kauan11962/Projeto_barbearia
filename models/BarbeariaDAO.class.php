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

    // Método para cadastrar uma nova empresa
    public function cadastrar($barbearia) {
        $sql = "INSERT INTO barbearia (nome, endereco, celular, cnpj, descricao, imagem, instagram, whatsapp, horario, id_dono) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        try {
            $stm = $this->db->prepare($sql);  // Usando $this->db
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
            return "Cadastro realizado com sucesso!";
        } catch (PDOException $e) {
            return "Erro ao cadastrar empresa: " . $e->getMessage();
        }
    }

    // Método para listar empresas com base no id_dono
    public function listarEmpresas($id_dono) {
        $sql = "SELECT * FROM barbearia WHERE id_dono = :id_dono";
        $stmt = $this->db->prepare($sql);  // Usando $this->db
        $stmt->bindParam(':id_dono', $id_dono);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function excluirEmpresa(int $idBarbearia): bool {
        $sql = "DELETE FROM barbearia WHERE id_barbearia = :id";
        $stmt = $this->db->prepare($sql); // Use prepare() do PDO
        $stmt->bindValue(':id', $idBarbearia, PDO::PARAM_INT); // Use bindValue() ou bindParam() do PDO
        return $stmt->execute(); // Execute a query
    
        if (!$stmt->execute()) {
            throw new Exception("Erro ao excluir a empresa: " . $stmt->error);
        }
    }    

}
?>
