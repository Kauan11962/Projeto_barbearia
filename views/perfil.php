<?php
session_start();
require_once "../views/header.php"; 
require_once "../models/Conexao.class.php"; 
require_once "../models/Cliente.class.php"; 
require_once "../models/clienteDAO.php"; 

$nome = htmlspecialchars($_SESSION["nome"]);
$sobrenome = htmlspecialchars($_SESSION["sobrenome"]);
$ftpadrao = "../imagens/clientes/ftpadrao.webp"; // Caminho da imagem padrão

$id_cliente = $_SESSION["id"];

$cliente = new Cliente($id_cliente);
$clienteDAO = new clienteDAO();
$ret = $clienteDAO->buscar_um_cliente($cliente);

// Define a imagem atual do usuário ou a imagem padrão
$imagem = !empty($ret[0]->imagem) ? $ret[0]->imagem : $ftpadrao;

if ($_POST) {
    $nova_imagem = $_FILES["imagem"]["name"] ?? ""; 
    $imagemTemp = $_FILES["imagem"]["tmp_name"];

    // Verifica se uma nova imagem foi enviada
    if ($imagemTemp) {
        $diretorio = "../imagens/clientes/"; 
        move_uploaded_file($imagemTemp, $diretorio . $nova_imagem);
        $_SESSION["imagem"] = $nova_imagem; // Atualiza a imagem na sessão
    } else {
        // Usa a imagem atual se nenhuma nova imagem for enviada
        $nova_imagem = $imagem;
    }

    $nova_senha = !empty($_POST["senha"]) ? md5($_POST["senha"]) : $ret[0]->senha;

    $cliente = new Cliente(
        $id_cliente,
        $_POST["nome"],
        $_POST["sobrenome"],
        $_POST["email"],
        $_POST["celular"],
        $nova_senha, 
        $_POST["preferencias"], 
        $nova_imagem
    );  

    $clienteDAO = new clienteDAO();
    $retorno = $clienteDAO->alterar($cliente);

    $_SESSION["nome"] = $_POST["nome"];
    $_SESSION["sobrenome"] = $_POST["sobrenome"];
    if (!empty($_POST["senha"])) {
        $_SESSION["senha"] = $_POST["senha"];
    }

    header("location:perfil.php?mensagem=$retorno");
    die();
}


?>




<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário - Barbearia Dark</title>
    <link rel="stylesheet" href="../css/perfil.css">
</head>
<body>
    <main>
        <h2>Perfil do Usuário</h2>
        <section class="perfil-container">
        <div class="perfil-info">
                <?php if (!empty($ret[0]->imagem)): ?>
                    <img src="../imagens/clientes/<?php echo $ret[0]->imagem; ?>" alt="Foto do cliente">
                <?php else: ?>
                    <img src="<?php echo $ftpadrao; ?>" alt="Foto padrão do cliente">
                <?php endif; ?>
                <?php echo "<h2>$nome $sobrenome</h2>"; ?>
                <p style="font-weight:bold" id="preferencias-usuario">Preferências: <?php echo $ret[0]->preferencias ?? 'Não especificadas'; ?></p> 
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
    <div id="modal-editar-perfil" class="modal">
        <div class="modal-content">
            <form enctype="multipart/form-data" action="#" method="post">

                <input type="hidden" name="id_cliente" value="<?php echo $clienteID; ?>">

                <span class="close" onclick="fecharModal('modal-editar-perfil')">&times;</span>

                <h2>Editar Perfil</h2>

                <label for="nome">Nome:</label>
                <input id="inputs" type="text" name="nome" value="<?php echo htmlspecialchars($ret[0]->nome ?? ''); ?>">

                <label for="sobrenome">Sobrenome:</label>
                <input id="inputs" type="text" name="sobrenome" value="<?php echo htmlspecialchars($ret[0]->sobrenome ?? ''); ?>">

                <label for="email">Email:</label>
                <input id="inputs" type="text" name="email" value="<?php echo htmlspecialchars($ret[0]->email ?? ''); ?>">

                <label for="celular">Celular:</label>
                <input id="inputs" type="text" name="celular" value="<?php echo htmlspecialchars($ret[0]->celular ?? ''); ?>">

                <label for="senha">Senha:</label>
                <input id="inputs" type="password" name="senha" value="">

                <label for="preferencias">Preferências:</label>
                <input id="inputs" type="text" name="preferencias" value="<?php echo htmlspecialchars($ret[0]->preferencias ?? ''); ?>">
            
                <label for="foto-input">Foto de Perfil:</label>
                <?php if (!empty($ret[0]->imagem)): ?>
                    <img style="width:10%" src="../imagens/clientes/<?php echo $ret[0]->imagem; ?>" alt="Foto do cliente">
                <?php else: ?>
                    <img style="width:10%" src="<?php echo $ftpadrao; ?>" alt="Foto padrão do cliente">
                <?php endif; ?>
                <input id="inputs" type="file" name="imagem" id="foto-input">
            
                <input style="cursor: pointer" type="submit" class="btn" value="Salvar">

            </form>
        </div>
    </div>

    <div id="modal-sair" class="modal">
        <div class="modal-content">
            <span class="close" onclick="fecharModal('modal-sair')">&times;</span>
            <h2>Sair da conta?</h2>
            
            <button id="sair" onclick="logout()">Sair</button>
            
            <button id="voltar" onclick="fecharModal('modal-sair')">Voltar</button>
        </div>
    </div>

    <script src="../js/perfil.js"></script>
</body>
</html>
