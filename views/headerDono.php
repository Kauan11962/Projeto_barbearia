<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="../css/cabecalho.css">
</head>
<body>
    <header>
        <div class="container-header">
            <h1>Barbearia Dark</h1>
            <ul>
                <li><a id="dashboard" href="../views/dashboard.php">Dashboard</a></li>
                <li><a id="agendamentos" href="../views/agendamentosbarbeiro.php">Agendamentos</a></li>
                <li><a id="barbearias" href="../views/cadastroBarbearia.php">Barbearias</a></li>
            </ul>
            <ul>
            <?php
                require_once "../models/Conexao.class.php"; 
                require_once "../models/Cliente.class.php"; 
                require_once "../models/clienteDAO.php";

                // Verifique se o id_dono está na sessão, em vez de id_cliente
                if (isset($_SESSION["id"])) {  // Verifica a sessão do dono
                    $id_dono = $_SESSION["id"];  // ID do dono logado
                    $nome = htmlspecialchars($_SESSION["nome"]);  // Nome do dono

                    echo "<li><a href='perfil2.php'>Bem-vindo, $nome </a></li>";  // Exibe o nome do dono
                } else {
                    echo '<li><a href="../views/login.php" id="login">Login</a></li>';
                    echo '<li><a href="../views/cadastro.php" class="btn-cadastrar">Cadastrar-se</a></li>';
                }
                ?>
            </ul>
        </div>
    </header>
</body>
</html>

