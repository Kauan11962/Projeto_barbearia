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
                if (isset($_SESSION["id"])) {
                    $nome = htmlspecialchars($_SESSION["nome"]);
                    $sobrenome = htmlspecialchars($_SESSION["sobrenome"]);
                    $imagemPerfil = isset($_SESSION["imagem"]) && !empty($_SESSION["imagem"]) ? "../imagens/clientes/" . htmlspecialchars($_SESSION["imagem"]) : "../imagens/clientes/ftpadrao.webp";

                    echo "<li><a href='perfil.php'>Bem-vindo, $nome $sobrenome <img src='$imagemPerfil' alt='Imagem de Perfil' class='imagem-perfil'></a></li>";
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
