<?php
session_start();
$msg = ["", "", ""];// armazenar mensagens de erro ou sucesso

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "../models/Conexao.class.php";
    require_once "../models/Cliente.class.php";
    require_once "../models/clienteDAO.php";

    //valida se os campos de entrada do formulário foram preenchidos
    function validarFormulario() {
        global $msg;
        $erro = false;

        if (empty($_POST["email"])) {
            $msg[0] = "Preencha o email";
            $erro = true;
        }

        if (empty($_POST["senha"])) {
            $msg[1] = "Preencha a senha";
            $erro = true;
        }

        return !$erro;
    }

    // Executa a validação e, se passar, faz o login
    if (validarFormulario()) {
        $cliente = new Cliente(email: $_POST["email"], senha: md5($_POST["senha"]));

        $clienteDAO = new clienteDAO();
        $ret = $clienteDAO->login($cliente);

        if (count($ret) == 1) {
            $_SESSION["id"] = $ret[0]->id_cliente;
            $_SESSION["nome"] = $ret[0]->nome;
            $_SESSION["sobrenome"] = $ret[0]->sobrenome;
            
            $_SESSION["imagem"] = !empty($ret[0]->imagem) ? $ret[0]->imagem : "ftpadrao.webp";


            header("location:../views/index.php");
            exit();
        } else {
            $msg[2] = "Verifique seus dados";
        }
    }
}
?>

<?php require_once "../views/header.php"; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbearia Dark - Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login2.css">
</head>
<body>  
    <main>
        <div class="container">
            <h2>Login</h2>
            <form action="#" method="post" class="form-login">

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" value="<?php echo isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : ''; ?>">
                <div id="msg-email" style="color: red; text-align: center;"><?php echo $msg[0]; ?></div>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha">
                <div id="msg-senha" style="color: red; text-align: center;"><?php echo $msg[1]; ?></div>

                <input type="submit" class="btn" value="Entrar">
                <div style="padding:4% 0 0 0; text-align:center;">Não possui conta?<a style="text-decoration:none; color:#F39C12" href="../views/cadastro.php"> Cadastre-se</a></div>
                <div style="color: red; font-weight: semibold; text-align: center;"><?php echo $msg[2]; ?></div>
            </form>
        </div>
    </main>
</body>
</html>
 