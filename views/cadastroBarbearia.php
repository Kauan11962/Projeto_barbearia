<?php
require_once "../views/headerDono.php";

if (!isset($_SESSION['msg'])) {
    $_SESSION['msg'] = ["", "", "", "", ""];
}

$msg = ["", "", "", ""];
$empresasCadastradas = [];
$erro = false;
$imgpadrao = "../imagens/barbearias/noimage.avif"; // Corrigido o caminho

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "../models/Conexao.class.php";
    require_once "../models/Barbearia.class.php";
    require_once "../models/barbeariaDAO.class.php";

    // Validação dos campos obrigatórios
    if (empty($_POST["nome"])) {
        $msg[0] = "Preencha o nome da empresa";
        $erro = true;
    }

    if (empty($_POST["endereco"])) {
        $msg[1] = "Preencha o endereço";
        $erro = true;
    }

    if (empty($_POST["celular"])) {
        $msg[2] = "Preencha o celular";
        $erro = true;
    }

    // Upload da imagem
    $imagem = $imgpadrao;
    if (isset($_FILES["imagem"]) && $_FILES["imagem"]["tmp_name"]) {
        $diretorio = "../imagens/barbearias/";
        $imagem = basename($_FILES["imagem"]["name"]);
        move_uploaded_file($_FILES["imagem"]["tmp_name"], $diretorio . $imagem);
    }

    if (!$erro) {
        // Criação do objeto Barbearia
        $barbearia = new Barbearia(
            nome: $_POST["nome"],
            endereco: $_POST["endereco"],
            celular: $_POST["celular"],
            cnpj: $_POST["cnpj"],
            descricao: $_POST["descricao"] ?? "",
            imagem: $imagem,
            instagram: $_POST["instagram"] ?? "",
            whatsapp: $_POST["whatsapp"] ?? "",
            horario: $_POST["horario"] ?? "",
            idDono: $_POST["id_dono"]
        );

        // Salvar a barbearia no banco
        $barbeariaDAO = new barbeariaDAO();
        if (!$barbeariaDAO->verificar($barbearia)) {
            $barbeariaDAO->cadastrar($barbearia);
            $msg[3] = "<div style='color: green; margin-top: 5%; font-weight: bold;'>Empresa cadastrada com sucesso!</div>";
        } else {
            $msg[4] = "<div style='color: red;'>Essa empresa já está cadastrada!</div>";
        }
    }
}

require_once "../models/Conexao.class.php";
require_once "../models/Barbearia.class.php";
require_once "../models/barbeariaDAO.class.php";

// Recuperar as empresas cadastradas para o dono
$barbeariaDAO = new barbeariaDAO();
$idDono = $_SESSION['id'] ?? null;
if ($idDono) {
    $empresasCadastradas = $barbeariaDAO->listarEmpresas($idDono);
}

// Lógica para exclusão
if (isset($_POST['excluir'], $_POST['id_empresa'])) {
    $idEmpresa = (int)$_POST['id_empresa'];
    $barbeariaDAO->excluirEmpresa($idEmpresa);
    $empresasCadastradas = $barbeariaDAO->listarEmpresas($idDono);
    $msg[3] = "<div style='color: green; margin-top: 5%; font-weight: bold;'>Empresa excluída com sucesso!</div>";
}
?>


<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Empresa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/cadastroBarbearia.css">
    <style>
        /* Inicialmente, as mensagens ficam ocultas */
        .mensagens {
            display: none;
        }
        .mensagens.show {
            display: block;
        }
    </style>
</head>
<body>
    <main>
        <section id="EmpresasD">
            <div class="NovaEmpresa">
                <div class="Nova1">
                    <img width="180px" src="../imagens/iconizer-caradobarSVG.svg">
                </div>
                <div class="Nova2">
                    <h1>Cadastre sua empresa</h1>
                    <p>Junte-se a nós e faça sua barbearia decolar!</p>
                    <a href="#" id="abrirModalBtn"><img width="42px" src="../imagens/iconizer-maisSVG.svg"></a>
                </div>
            </div>
        </section>
            
        <!-- Modal com formulário de cadastro -->
        <div id="modal" class="modal">
            <div class="modal-conteudo">
                <span class="fechar" id="fecharModalBtn">&times;</span>
                <h2>Cadastro de Empresa</h2>
                <form action="cadastroBarbearia.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="nome" placeholder="Nome da Empresa" required><br>
                    <input type="text" name="endereco" placeholder="Endereço" required><br>
                    <input type="text" name="celular" placeholder="Celular" required><br>
                    <input type="text" name="cnpj" placeholder="CNPJ" required><br>
                    <input type="text" name="descricao" placeholder="Descrição da Empresa"><br>
                    <input type="text" name="instagram" placeholder="@ do Instagram"><br>
                    <input type="text" name="whatsapp" placeholder="Número do WhatsApp"><br>
                    <textarea name="horario" placeholder="Descreva os horários da semana"></textarea>
                    <label for="imagem">Foto da Empresa:</label>
                    <input type="file" name="imagem" id="imagem"><br>
                    <input type="hidden" name="id_dono" value="<?php echo $_SESSION['id']; ?>">
                    <button type="submit">Confirmar Cadastro</button>
                </form>

            </div>
        </div>

        <!-- Exibição das empresas acumuladas -->
        <?php if (!empty($empresasCadastradas)) { ?>
        <div id="empresasAcumuladas">
            <h3>Empresas Cadastradas:</h3>
            <ul>
                <?php foreach ($empresasCadastradas as $empresa) { ?>
                    <li>
                        <p><strong>Nome da Barbearia:</strong> <?php echo htmlspecialchars($empresa['nome']); ?></p>
                        <p><strong>Endereço:</strong> <?php echo htmlspecialchars($empresa['endereco']); ?></p>
                        <p><strong>Celular:</strong> <?php echo htmlspecialchars($empresa['celular']); ?></p>
                        <p><strong>CNPJ:</strong> <?php echo htmlspecialchars($empresa['cnpj']); ?></p>
                        <p><strong>Descrição:</strong> <?php echo htmlspecialchars($empresa['descricao']); ?></p>
                        <p><strong>Instagram:</strong> <a href="https://instagram.com/<?php echo htmlspecialchars($empresa['instagram']); ?>" target="_blank"><?php echo htmlspecialchars($empresa['instagram']); ?></a></p>
                        <p><strong>WhatsApp:</strong> <?php echo htmlspecialchars($empresa['whatsapp']); ?></p>
                        <p><strong>Horários:</strong> <?php echo htmlspecialchars($empresa['horario']); ?></p>
                        <p><strong>Imagem:</strong> <img src="../imagens/barbearias/<?php echo htmlspecialchars($empresa['imagem']); ?>" alt="Imagem da Barbearia" width="100"></p>
                        <hr>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <?php } ?>

        <?php                       
            if (isset($_POST['excluir']) && isset($_POST['id_empresa'])) {
                $idEmpresa = (int)$_POST['id_empresa'];
                $barbeariaDAO->excluirEmpresa($idEmpresa);
                
                // Atualizar a lista de empresas após a exclusão
                $empresasCadastradas = $barbeariaDAO->listarEmpresas($_SESSION['id']);
                $msg = "<div style='display: none;'></div>";
            }            
        ?>

        <script src="../js/cadastroBarbearia.js"></script>

    </main>

    <div class="bruxas">
        <div class="boxDescubra">
            <div class="bb1">
                <h4>Descubra o que os seus clientes estão pensando</h4>
                <h5>Lugar muito bom</h5>
                <p>Lugar muito bom, ambiente bonito e limpo. Atendimento personalizado, e de consegui expressar o que eu queria no meu corte de cabelo e barba.</p>
            </div>
            <img width="220px" src="../imagens/profile data-cuate.png" >
        </div>
    </div>

    <?php require_once "footer.php"; ?>

</body>
</html>
