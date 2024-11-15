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
                <li><a id="home" href="../views/index.php">Home</a></li>
                <li><a id="barbearias" href="../views/barbearia.php">Barbearias</a></li>
                <li><a id="contato" href="../views/contato.php">Contato</a></li>
                <li><a id="empresa" href="../views/empresa.php">Empresa</a></li>
            </ul>
            <ul>
            <?php
                require_once "../models/Conexao.class.php"; 
                require_once "../models/Cliente.class.php"; 
                require_once "../models/clienteDAO.php";

                if (isset($_SESSION["id"])) {
                    $id_cliente = $_SESSION["id"];
                    $nome = htmlspecialchars($_SESSION["nome"]);
                    $sobrenome = htmlspecialchars($_SESSION["sobrenome"]);
                    $ftpadrao = "../imagens/clientes/ftpadrao.webp"; 

                    $cliente = new Cliente($id_cliente);
                    $clienteDAO = new clienteDAO();
                    $ret = $clienteDAO->buscar_um_cliente($cliente);

                    $imagemPerfil = !empty($ret[0]->imagem) ? "../imagens/clientes/" . htmlspecialchars($ret[0]->imagem) : $ftpadrao;

                    echo "<li><a href='perfil.php'>Bem-vindo, $nome $sobrenome <img src='$imagemPerfil' alt='Imagem do cliente' class='imagem-perfil'></a></li>";
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
