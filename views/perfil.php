<?php
require_once "../views/header.php"; 
require_once "../models/Conexao.class.php"; 
require_once "../models/Cliente.class.php"; 
require_once "../models/clienteDAO.php"; 

$nome = htmlspecialchars($_SESSION["nome"]);
$sobrenome = htmlspecialchars($_SESSION["sobrenome"]);

if($_GET) {
    $cliente = new Cliente($_GET["id"]);
    $clienteDAO = new clienteDAO();
    $ret = $clienteDAO->buscar_cliente($cliente);

    // Verificando se a consulta retornou algum resultado
    if (isset($ret) && count($ret) > 0) {
        $nome = htmlspecialchars($ret[0]->nome);
        $sobrenome = htmlspecialchars($ret[0]->sobrenome);
    } else {
        // Caso não tenha retornado resultados
        echo "Cliente não encontrado.";
        exit();
    }
}

if($_POST) {
    // Verificando se foi enviado uma nova imagem
    if (!empty($_FILES["imagem"]["name"])) {
        $imagem = $_FILES["imagem"]["name"];
    } else {
        // Caso contrário, mantendo a imagem atual
        $imagem = $_POST["imagem_atual"];
    }

    // Alterando a senha para usar md5 (ou password_hash para mais segurança)
    $senha = md5($_POST["senha"]); // Mudança de mds() para md5()

    $cliente = new Cliente(
        nome: $_POST["nome"],
        sobrenome: $_POST["sobrenome"],
        email: $_POST["email"],
        celular: $_POST["celular"],
        senha: $senha, // A senha foi alterada para ser passada como md5
        preferencias: $_POST["preferencias"], 
        imagem: $imagem,
        id_cliente: $_POST["id_cliente"]
    );

    $clienteDAO = new clienteDAO();
    $retorno = $clienteDAO->alterar($cliente);

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
            <!-- Informações do usuário -->
            <div class="perfil-info">
                <img src="../imagens/ftpadrao.webp" alt="Foto do Usuário" class="perfil-foto" id="foto-usuario">
                <?php echo "<h2>$nome $sobrenome </h2>" ?>
                <p style="font-weight:bold" id="preferencias-usuario">Preferências:<?php echo " ..."  ?></p> 
                <button onclick="editarPerfil()">Editar Perfil</button>
            </div>

            <!-- Opções do perfil -->
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

                <span class="close" onclick="fecharModal('modal-editar-perfil')">&times;</span>

                <h2>Editar Perfil</h2>

                <label for="nome">Nome:</label>
                <input id="inputs" type="text" id="nome" value="<?php echo isset($ret[0]) ? $ret[0]->nome : ''; ?>">

                <label for="sobrenome">Sobrenome:</label>
                <input id="inputs" type="text" id="sobrenome" value="<?php echo isset($ret[0]) ? $ret[0]->sobrenome : ''; ?>">

                <label for="email">Email:</label>
                <input id="inputs" type="text" id="email" value="<?php echo isset($ret[0]) ? $ret[0]->email : ''; ?>">

                <label for="celular">Celular:</label>
                <input id="inputs" type="text" id="celular" value="<?php echo isset($ret[0]) ? $ret[0]->celular : ''; ?>">

                <label for="senha">Senha:</label>
                <input id="inputs" type="text" id="senha" value="<?php echo isset($ret[0]) ? $ret[0]->senha : ''; ?>">

                <label for="preferencias">Preferências:</label>
                <input id="inputs" type="text" id="preferencias" value="<?php echo isset($ret[0]) ? $ret[0]->preferencias : ''; ?>">
            
                <label for="foto-input">Foto de Perfil:</label>
                <?php if (!empty($ret[0]->imagem)): ?>
                    <img style="width:10%" src="../imagens/clientes/<?php echo $ret[0]->imagem; ?>" alt="Foto do cliente">
                <?php else: ?>
                    <img style="width:10%" src="../imagens/ftpadrao.webp" alt="Foto padrão do cliente">
                <?php endif; ?>
                <input id="inputs" type="file" name="imagem" id="foto-input">
            
                <input type="submit" class="btn" value="Salvar">

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

    </div>
    <script src="../js/perfil.js"></script>

</body>
</html>
