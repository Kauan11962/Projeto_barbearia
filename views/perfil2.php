<?php
session_start();
require_once "../views/headerDono.php"; 
require_once "../models/Conexao.class.php"; 
require_once "../models/Dono.class.php"; 
require_once "../models/donoDAO.php"; 

$nome = htmlspecialchars($_SESSION["nome"]);
$sobrenome = htmlspecialchars($_SESSION["sobrenome"]);
$ftpadrao = "../imagens/clientes/ftpadrao.webp"; 

$id_dono = $_SESSION["id"];

$dono = new Dono($id_dono);
$donoDAO = new donoDAO();
$ret = $donoDAO->buscar_um_dono($dono);

$imagem = !empty($ret[0]->imagem) ? $ret[0]->imagem : $ftpadrao;

if ($_POST) {
    $nova_imagem = $_FILES["imagem"]["name"] ?? ""; 
    $imagemTemp = $_FILES["imagem"]["tmp_name"];

    if ($imagemTemp) {
        $diretorio = "../imagens/clientes/"; 
        move_uploaded_file($imagemTemp, $diretorio . $nova_imagem);
        $_SESSION["imagem"] = $nova_imagem;
    } else {
        $nova_imagem = $imagem;
    }

    $nova_senha = !empty($_POST["senha"]) ? md5($_POST["senha"]) : $ret[0]->senha;

    $dono = new Dono(
        $id_dono,
        $_POST["nome"],
        $_POST["sobrenome"],
        $_POST["email"],
        $_POST["celular"],
        $nova_senha, 
        $_POST["cpf"], 
        $_POST["data_nasc"], 
        $nova_imagem
    );  

    $donoDAO = new donoDAO();
    $retorno = $donoDAO->alterar($dono);

    $_SESSION["nome"] = $_POST["nome"];
    $_SESSION["sobrenome"] = $_POST["sobrenome"];
    if (!empty($_POST["senha"])) {
        $_SESSION["senha"] = $_POST["senha"];
    }

    header("location:perfil2.php?mensagem=$retorno");
    die();


}


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Dono - Barbearia Dark</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="../css/perfil2.css">
</head>
<body>
    <main>
        <h2>Perfil do Dono</h2>
        <section class="perfil-container">
        <div class="perfil-info">
                <?php if (!empty($ret[0]->imagem)): ?>
                    <img src="../imagens/clientes/<?php echo $ret[0]->imagem; ?>" alt="Foto do dono">
                <?php else: ?>
                    <img src="<?php echo $ftpadrao; ?>" alt="Foto padrão do dono">
                <?php endif; ?>
                <?php echo "<h2>$nome $sobrenome</h2>"; ?>
                <button onclick="editarPerfil()">Editar Perfil</button>
            </div>

            <div class="perfil-opcoes">
                <h3>Opções</h3>
                <div class="opcao" onclick="visualizarFavoritos()">
                    <h4>Favoritos</h4>
                    <p>Verificar as barbearias favoritas</p>
                </div>
                <div class="opcao" onclick="visualizarHistorico()">
                    <h4>Histórico de Serviços</h4>
                    <p>Visualizar todos os serviços realizados</p>
                </div>
                <div class="opcao" onclick="suporte()">
                    <h4>Suporte e Ajuda</h4>
                    <p>Entre em contato com nosso suporte</p>
                </div>
                <div class="opcao" onclick="sairPerfil()">
                    <h4>Sair</h4>
                    <p>Sair dessa conta</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal para editar perfil -->
    <div  id="modal-editar-perfil" class="modal">
        <div class="modal-content">
            <form enctype="multipart/form-data" action="#" method="post">

                <input type="hidden" name="id_dono" value="<?php echo $donoID; ?>">

                <span class="close" onclick="fecharModal('modal-editar-perfil')">&times;</span>

                <h2>Editar Perfil</h2>

                <label for="nome">Nome:</label>
                <input id="inputs" type="text" name="nome" value="<?php echo htmlspecialchars($ret[0]->nome ?? ''); ?>">

                <label for="sobrenome">Sobrenome:</label>
                <input id="inputs" type="text" name="sobrenome" value="<?php echo htmlspecialchars($ret[0]->sobrenome ?? ''); ?>">

                <label for="email">Email:</label>
                <input id="inputs" type="text" name="email" value="<?php echo htmlspecialchars($ret[0]->email ?? ''); ?>">

                <label for="celular">Celular:</label>
                <input class="celular" id="inputs" type="text" name="celular" value="<?php echo htmlspecialchars($ret[0]->celular ?? ''); ?>">

                <label for="senha">Senha:</label>
                <input id="inputs" type="password" name="senha" value="">

                <label for="cpf">CPF:</label>
                <input class="cpf" id="inputs" type="text" name="cpf" value="<?php echo htmlspecialchars($ret[0]->cpf ?? ''); ?>">

                <label for="data_nasc">Data de nascimento:</label>
                <input class="data_nasc" id="inputs" type="text" name="data_nasc" value="<?php echo htmlspecialchars($ret[0]->data_nasc ?? ''); ?>">
            
                <label for="foto-input" id="labelfoto">Foto de Perfil:</label>
                <?php if (!empty($ret[0]->imagem)): ?>
                    <img style="width: 50px;height: 50px;border-radius: 50%;object-fit: cover;" src="../imagens/clientes/<?php echo $ret[0]->imagem; ?>" alt="Foto do dono">
                <?php else: ?>
                    <img style="width: 50px;height: 50px;border-radius: 50%;object-fit: cover;" src="<?php echo $ftpadrao; ?>" alt="Foto padrão do dono">
                <?php endif; ?>
                <input id="inputs" type="file" name="imagem" style="margin-left: -3%; width: 17%; background-color: rgb(0 0 0 / 0%);">
            
                <input style="cursor: pointer" type="submit" class="btn" value="Salvar">

            </form>
        </div>
    </div>

    <div id="modal-sair" class="modal">
        <div class="modal-content">
            <span class="close" onclick="fecharModal('modal-sair')">&times;</span>
            <h2>Sair da conta?</h2>
            
            <button id="sair" onclick="logout()">Sair</button>
            
            <button id="sair" onclick="fecharModal('modal-sair')">Voltar</button>
        </div>
    </div>

    <script src="../js/perfil.js"></script>

    <script>
    $(document).ready(function(){
        $('.cpf').mask('000.000.000-00', {reverse: true});
        
        $('.celular').mask('(00) 00000-0000');
        
        $('.data_nasc').mask('00/00/0000');
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