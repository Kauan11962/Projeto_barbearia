<?php
class barbeariaDAO extends Conexao {

    // Método para verificar se a empresa já está cadastrada
    public function verificar($barbearia) {
        $sql = "SELECT * FROM barbearias WHERE nome = ? AND endereco = ?";
        $stm = $this->db->prepare($sql);  // Usando $this->db
        $stm->bindValue(1, $barbearia->getNome());
        $stm->bindValue(2, $barbearia->getEndereco());
        $stm->execute();

        // Se encontrar um registro, a empresa já existe
        return $stm->rowCount() > 0;
    }

    // Método para cadastrar uma nova empresa
    public function cadastrar($barbearia) {
        $sql = "INSERT INTO barbearias (nome, endereco, telefone, id_dono) VALUES (?, ?, ?, ?)";
        try {
            $stm = $this->db->prepare($sql);  // Usando $this->db
            $stm->bindValue(1, $barbearia->getNome());
            $stm->bindValue(2, $barbearia->getEndereco());
            $stm->bindValue(3, $barbearia->getTelefone());
            $stm->bindValue(4, $barbearia->getIdDono());
            $stm->execute();
            return "Cadastro realizado com sucesso!";
        } catch (PDOException $e) {
            return "Erro ao cadastrar empresa: " . $e->getMessage();
        }
    }

    // Método para listar empresas com base no id_dono
    public function listarEmpresas($id_dono) {
        $sql = "SELECT * FROM barbearias WHERE id_dono = :id_dono";
        $stmt = $this->db->prepare($sql);  // Usando $this->db
        $stmt->bindParam(':id_dono', $id_dono);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function excluirEmpresa(int $idBarbearia): bool {
        $sql = "DELETE FROM barbearias WHERE id_barbearia = :id";
        $stmt = $this->db->prepare($sql); // Use prepare() do PDO
        $stmt->bindValue(':id', $idBarbearia, PDO::PARAM_INT); // Use bindValue() ou bindParam() do PDO
        return $stmt->execute(); // Execute a query
    
        if (!$stmt->execute()) {
            throw new Exception("Erro ao excluir a empresa: " . $stmt->error);
        }
    }    

}
?>
