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
                <li><a id="home" href="../views/headerDono.php">Home</a></li>
                <li><a id="barbearias" href="../views/barbearia.php">Barbearias</a></li>
                <li><a id="contato" href="../views/contato.php">Contato</a></li>
            </ul>
            <ul>
            <?php
                require_once "../models/Conexao.class.php"; 
                require_once "../models/Cliente.class.php"; 
                require_once "../models/clienteDAO.php";

                // Verifique se o id_dono está na sessão, em vez de id_cliente
                if (isset($_SESSION["id_dono"])) {  // Verifica a sessão do dono
                    $id_dono = $_SESSION["id_dono"];  // ID do dono logado
                    $nome = htmlspecialchars($_SESSION["nome"]);  // Nome do dono
                    $sobrenome = htmlspecialchars($_SESSION["sobrenome"]);  // Sobrenome do dono

                    //Instanciamos ClienteDAO e buscamos a imagem atualizada do cliente
                    //$cliente = new Cliente($id_cliente);
                    //$clienteDAO = new clienteDAO();
                    //$ret = $clienteDAO->buscar_um_cliente($cliente);

                    // Verificamos se há uma imagem definida para o cliente
                    //$imagemPerfil = !empty($ret[0]->imagem) ? "../imagens/clientes/" . htmlspecialchars($ret[0]->imagem) : $ftpadrao;

                    echo "<li><a href='perfil.php'>Bem-vindo, $nome $sobrenome</a></li>";  // Exibe o nome do dono
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

