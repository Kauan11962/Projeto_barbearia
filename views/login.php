<?php

    session_start();

    $msg = ["","",""];

    if($_POST)
    {
        require_once "../models/Conexao.class.php";
        require_once "../models/Cliente.class.php";
        require_once "../models/clienteDAO.php";

        $erro = false;

        if(empty($_POST["email"]))
        {
            $msg[0] = "Preencha o email";
            $erro = true;
        }

        if(empty($_POST["senha"]))
        {
            $msg[1] = "Preencha a senha";
            $erro = true;
        }

        if(!$erro)
        {
            $cliente = new Cliente(email:$_POST["email"], senha:md5($_POST["senha"]));

            $clienteDAO = new clienteDAO();
            $ret = $clienteDAO->login($cliente);

            if(count($ret) == 1)
            {
                $_SESSION["id"] = $ret[0]->id_cliente;
                $_SESSION["nome"] = $ret[0]->nome;

                header("location:../views/index.php");
                die();
            }
            else
            {
                $msg[2] = "Verifique seus dados";
            }
        }

    }

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Barbearia Dark</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
    <script src="../js/script.js"></script>
</head>
<body>
    <header>
        <div class="container-header">
            <h1>Barbearia Dark</h1>
                <ul>
                    <li><a href="../views/index.php">Home</a></li>
                    <li><a href="../views/agendamento.php">Agendar</a></li>
                    <li><a href="../views/contato.php">Contato</a></li>
                </ul>
                <ul>
                    <li><a href="../views/login.php" id="login">Login</a></li>
                    <li><a href="../views/cadastro.php" class="btn-cadastrar">Cadastrar-se</a></li>
                </ul>
        </div>
    </header>    

    <main>
        <div class="container">
            <h2>Login</h2>
            <form action="#" method="post" class="form-login">

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" >
                <div><?php echo $msg[0]; ?></div>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" >
                <div><?php echo $msg[1]; ?></div>

                <input type="submit" class="btn"></input>
                <div style="color: red; font-weight: semibold; text-align: center; padding-top:4%;"><?php echo $msg[2]; ?></div>
            </form>
        </div>
    </main>
</body>
</html>
