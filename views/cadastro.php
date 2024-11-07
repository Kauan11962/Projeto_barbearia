<?php
require_once "../views/header.php"; 

$msg = ["","","","","","",""];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "../models/Conexao.class.php";
    require_once "../models/Cliente.class.php";
    require_once "../models/clienteDAO.php"; 

    $erro = false;

    if(empty($_POST["nome"])) {
        $msg[0] = "Preencha o nome";
        $erro = true;
    }

    if(empty($_POST["sobrenome"])) {
        $msg[1] = "Preencha o sobrenome";
        $erro = true;
    }

    if(empty($_POST["email"])) {
        $msg[2] = "Preencha o email";
        $erro = true;
    }

    if(empty($_POST["celular"])) {
        $msg[3] = "Preencha o celular";
        $erro = true;
    }

    if(empty($_POST["senha"])) {
        $msg[4] = "Preencha a senha";
        $erro = true;
    }

    if(empty($_POST["confirmar_senha"])) {
        $msg[5] = "Confirme a senha";
        $erro = true;
    }

    if ($_POST["senha"] !== $_POST["confirmar_senha"]) {
        $msg[5] = "As senhas não coincidem";
        $erro = true;
    }

    if(!$erro) {
        
        $cliente = new Cliente(nome: $_POST["nome"], sobrenome: $_POST["sobrenome"], email: $_POST["email"], celular: $_POST["celular"], senha:md5($_POST["senha"]));
        $clienteDAO = new ClienteDAO();

        $verificacao = $clienteDAO->verificar($cliente);

        if ($verificacao) {
            $msg[6] = "Dados já cadastrados"; 
            $erro = true;
        }
    }

    if (!$erro) {
        $retorno = $clienteDAO->cadastrar($cliente);
        $msg[6] = "Cliente cadastrado com sucesso"; 
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Barbearia Dark</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/cadastro.css">
</head>
<body>
    <div class="container">
        <div class="form-image">
            <img src="../imagens/barbershop waiting clients-bro.png" alt="">
        </div>
        <div class="form">
            <form action="#" method="post" id="cadastroForm">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="firstname">Primeiro Nome</label>
                        <input id="firstname" type="text" name="nome" placeholder="Digite seu primeiro nome" required>
                        <div style="color: red;"><?php echo $msg[0]; ?></div>
                    </div>

                    <div class="input-box">
                        <label for="lastname">Sobrenome</label>
                        <input id="lastname" type="text" name="sobrenome" placeholder="Digite seu sobrenome" required>
                        <div style="color: red;"><?php echo $msg[1]; ?></div>
                    </div>
                    
                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
                        <div style="color: red;"><?php echo $msg[2]; ?></div>
                    </div>

                    <div class="input-box">
                        <label for="number">Celular</label>
                        <input id="number" type="tel" name="celular" placeholder="(xx) xxxx-xxxx" required>
                        <div style="color: red;"><?php echo $msg[3]; ?></div>
                    </div>

                    <div class="input-box">
                        <label for="password">Senha</label>
                        <input id="password" type="password" name="senha" placeholder="Digite sua senha" required>
                        <div style="color: red;"><?php echo $msg[4]; ?></div>
                    </div>

                    <div class="input-box">
                        <label for="confirmPassword">Confirme sua Senha</label>
                        <input id="confirmPassword" type="password" name="confirmar_senha" placeholder="Digite sua senha novamente" required>
                        <div style="color: red;"><?php echo $msg[5]; ?></div>
                    </div>
                </div>

                <input id="submitBtn" class="btn" type="submit" value="Cadastrar-se"><br><br>
                <div style="color: white;"><?php echo $msg[6]; ?></div>
            </form>
        </div>
    </div>
</body>
</html>