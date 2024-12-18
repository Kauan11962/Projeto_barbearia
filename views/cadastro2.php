<?php
require_once "../views/header.php"; 

$msg = ["","","","","","","","",""];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "../models/Conexao.class.php";
    require_once "../models/Dono.class.php";
    require_once "../models/donoDAO.php"; 

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

    if(empty($_POST["cpf"])) {
        $msg[6] = "Preencha o CPF";
        $erro = true;
    }

    if(empty($_POST["data_nasc"])) {
        $msg[7] = "Preencha a data de nascimento";
        $erro = true;
    }

    if ($_POST["senha"] !== $_POST["confirmar_senha"]) {
        $msg[5] = "As senhas não coincidem";
        $erro = true;
    }

    if(!$erro) {
        
        $dono = new Dono(nome: $_POST["nome"], sobrenome: $_POST["sobrenome"], email: $_POST["email"], celular: $_POST["celular"], senha:md5($_POST["senha"]), cpf: $_POST["cpf"], 
        data_nasc: $_POST["data_nasc"]);

        $donoDAO = new donoDAO();

        $verificacao = $donoDAO->verificar($dono);

        if ($verificacao) {
            $msg[8] = "<div style='color: red; font-weight: bold;'>Dados já cadastrados</div>"; 
            $erro = true;
        }
    }

    if (!$erro) {
        $retorno = $donoDAO->cadastrar($dono);
        $msg[8] = "<div style='color: #28a745; font-weight: bold;'>Dono cadastrado com sucesso</div>"; 

        $dono = new Dono(email: $_POST["email"], senha: md5($_POST["senha"]));
  
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
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
                        <input id="firstname" type="text" name="nome" placeholder="Digite seu primeiro nome" >
                        <div style="color: red;"><?php echo $msg[0]; ?></div>
                    </div>

                    <div class="input-box">
                        <label for="lastname">Sobrenome</label>
                        <input id="lastname" type="text" name="sobrenome" placeholder="Digite seu sobrenome" >
                        <div style="color: red;"><?php echo $msg[1]; ?></div>
                    </div>
                    
                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu e-mail" >
                        <div style="color: red;"><?php echo $msg[2]; ?></div>
                    </div>

                    <div class="input-box">
                        <label for="number">Celular</label>
                        <input id="celular" type="tel" name="celular" placeholder="(xx) xxxx-xxxx" >
                        <div style="color: red;"><?php echo $msg[3]; ?></div>
                    </div>

                    <div class="input-box">
                        <label for="password">Senha</label>
                        <div id="container-senha">
                            <input id="password" type="password" name="senha" placeholder="Digite sua senha" >
                            <i style="cursor: pointer; margin: 0 auto;" class="bi bi-eye-slash" id="togglePassword"></i>
                        </div>
                        <div style="color: red;"><?php echo $msg[4]; ?></div>
                    </div>

                    <div class="input-box">
                        <label for="confirmPassword">Confirme sua Senha</label>
                        <input id="confirmPassword" type="password" name="confirmar_senha" placeholder="Digite sua senha novamente" >
                        <div style="color: red;"><?php echo $msg[5]; ?></div>
                    </div>

                    <div class="input-box">
                        <label for="cpf">CPF</label>
                        <input id="cpf" type="text" name="cpf" placeholder="Digite seu CPF" >
                        <div style="color: red;"><?php echo $msg[6]; ?></div>
                    </div>

                    <div class="input-box">
                        <label for="data_nasc">Data de nascimento</label>
                        <input id="data_nasc" type="text" name="data_nasc" placeholder="Digite sua data de nascimento" >
                        <div style="color: red;"><?php echo $msg[7]; ?></div>
                    </div>
                </div>
                
                
                <div style="margin-top: -4%">
                    <input id="submitBtn" class="btn" type="submit" value="Cadastrar-se"><br><br>
                    <div style="margin-top: -3%">Já possui uma conta?<a id="entrar" href="../views/login2.php"> Entrar</a></div>
                    <div><?php echo $msg[8]; ?></div>
                </div>
            </form>
        </div>
    </div>

<script>
    $(document).ready(function(){
        $('#cpf').mask('000.000.000-00', {reverse: true});
        
        $('#celular').mask('(00) 00000-0000');
        
        $('#data_nasc').mask('00/00/0000');
    });

    $('#togglePassword').click(function() {
            const passwordField = $('#password');
            const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
            passwordField.attr('type', type);
            $(this).toggleClass('bi-eye');
            $(this).toggleClass('bi-eye-slash');
        });
</script>

</body>
</html>
