<?php
	if(!isset($_SESSION))
	{
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
                    <li><a href="../views/index.php">Home</a></li>
                    <li><a href="../views/barbearia.php">Barbearias</a></li>
                    <li><a href="../views/contato.php">Contato</a></li>
                    <li><a href="../views/empresa.php">Empresa</a></li>
                </ul>
                <ul>
                <?php

                if (isset($_SESSION["id"])) {

                    $nome = htmlspecialchars($_SESSION["nome"]);
                    $imagemPerfil = isset($_SESSION["imagem_perfil"]) ? $_SESSION["imagem_perfil"] : "../imagens/ftpadrao.webp";

                    echo "<li><a href='perfil.php'>Bem-vindo, $nome <img src='$imagemPerfil' alt='Imagem de Perfil' class='imagem-perfil'></a></li>";
                }
                else 
                {
                    echo '<li><a href="../views/login.php" id="login">Login</a></li>';
                    echo '<li><a href="../views/cadastro.php" class="btn-cadastrar">Cadastrar-se</a></li>';
                }
                ?>
            </ul>
        </div>
    </header>
    </body>
</html>