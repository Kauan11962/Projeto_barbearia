<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="../css/cabecalho.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container-header">
            <h1><a style="text-decoration: none; color: #fff;" href="../views/dashboard.php">Barbearia Dark</a></h1>
            <ul>
                <li><a id="dashboard" href="../views/dashboard.php">Dashboard</a></li>
                <li><a id="agendamentos" href="../views/agendamentosbarbeiro.php">Agendamentos</a></li>
                <li><a id="barbearias" href="../views/cadastroBarbearia.php">Barbearias</a></li>
            </ul>
            <ul>
            <?php
                require_once "../models/Conexao.class.php"; 
                require_once "../models/Dono.class.php"; 
                require_once "../models/donoDAO.php"; 

                // Verifique se o id_dono está na sessão, em vez de id_dono
                if (isset($_SESSION["id"])) {  // Verifica a sessão do dono
                    $id_dono = $_SESSION["id"];  // ID do dono logado
                    $nome = htmlspecialchars($_SESSION["nome"]);  // Nome do dono

                    $ftpadrao = "../imagens/clientes/ftpadrao.webp"; // Caminho da imagem padrão

                    // Instanciamos donoDAO e buscamos a imagem atualizada do dono
                    $dono = new Dono($id_dono);
                    $donoDAO = new donoDAO();
                    $ret = $donoDAO->buscar_um_dono($dono);

                    // Verificamos se há uma imagem definida para o dono
                    $imagemPerfil = !empty($ret[0]->imagem) ? "../imagens/clientes/" . htmlspecialchars($ret[0]->imagem) : $ftpadrao;


                    echo "<li><a href='perfil2.php'>Bem-vindo, $nome <img src='$imagemPerfil' alt='Imagem do cliente' class='imagem-perfil'></a></li>";  // Exibe o nome do dono
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

