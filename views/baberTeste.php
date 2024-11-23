<?php
require_once "../models/Conexao.class.php";
require_once "../models/Barbearia.class.php";
require_once "../models/BarbeariaDAO.class.php";
require_once "../views/header.php";

// Verifica se o id_barbearia foi passado na URL
if (isset($_GET['id_barbearia'])) {
    $idBarbearia = intval($_GET['id_barbearia']); // Sanitiza o ID para evitar injeção SQL

    // Consulta para obter os dados da barbearia
    $dao = new BarbeariaDAO(); // Cria uma instância do DAO
    $barbearia = $dao->buscarBarbeariaPorId($idBarbearia);

    if ($barbearia) {
        // Exibir detalhes da barbearia
        ?>
        <h1>Detalhes da Barbearia</h1>
        <p><strong>Nome da Barbearia:</strong> <?php echo htmlspecialchars($barbearia['nome']); ?></p>
        <p><strong>Nome do Dono:</strong> <?php echo htmlspecialchars($barbearia['nome_dono']); ?></p>
        <p><strong>Endereço:</strong> <?php echo htmlspecialchars($barbearia['endereco']); ?></p>
        <p><strong>Celular:</strong> <?php echo htmlspecialchars($barbearia['celular']); ?></p>
        <p><strong>CNPJ:</strong> <?php echo htmlspecialchars($barbearia['cnpj']); ?></p>
        <a href="../views/barbeariaTeste.php">Voltar</a>
        <?php
    } else {
        echo "<p>Barbearia não encontrada.</p>";
    }
} else {
    echo "<p>ID de barbearia não fornecido.</p>";
}
?>
