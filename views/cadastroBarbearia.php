<?php
require_once "../views/headerDono.php"; 

//var_dump($_POST);
//var_dump($_SESSION);

if (!isset($_SESSION['msg'])) {
    $_SESSION['msg'] = ["", "", "", ""];
}

$msg = ["","","",""];
$empresasCadastradas = []; // Array para armazenar as empresas cadastradas
$erro = false; // Inicialize a variável $erro

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "../models/Conexao.class.php";   // Conexão com o banco
    require_once "../models/Barbearia.class.php";  // Modelo da Barbearia
    require_once "../models/barbeariaDAO.class.php";     // DAO para realizar operações no banco

    $_SESSION['$msg'] = ["", "", "", ""];

    // Validação dos campos
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

    // Se não houver erro, continua o processo de cadastro
    if (!$erro) {
        // Criação do objeto Barbearia
        $barbearia = new Barbearia(nome: $_POST["nome"], endereco: $_POST["endereco"], celular: $_POST["celular"], cnpj: $_POST["cnpj"], idDono: $_POST["id_dono"]);
        $barbeariaDAO = new barbeariaDAO();

        // Verifica se a empresa já foi cadastrada
        $verificacao = $barbeariaDAO->verificar($barbearia);

        if ($verificacao) {
            $msg[3] = "<div style='color: red;margin-top: 5%;font-weight: bold;'>Essa empresa já está cadastrada!</div>";
            $erro = true;
        }
    }

    // Caso não haja erro, realiza o cadastro
    if (!$erro) {
        $retorno = $barbeariaDAO->cadastrar($barbearia);
        //$msg[3] = "<div style='color: green;margin-top: 5%; font-weight: bold;'>Empresa cadastrada com sucesso!</div>"; 

        var_dump ($retorno);
    }
}

// Recuperar as empresas cadastradas para o dono
require_once "../models/Conexao.class.php";  
require_once "../models/barbeariaDAO.class.php";
require_once "../models/Barbearia.class.php";
$barbeariaDAO = new barbeariaDAO();
$idDono = $_POST['id_dono'] ?? null;

if ($idDono !== null) {
    $empresasCadastradas = $barbeariaDAO->listarEmpresas($idDono);
} else {
    $empresasCadastradas = [];
}

// Lógica para exclusão
if (isset($_POST['excluir']) && isset($_POST['id_empresa'])) {
    $idEmpresa = (int)$_POST['id_empresa'];
    $barbeariaDAO->excluirEmpresa($idEmpresa);
    
    // Atualizar a lista de empresas após a exclusão
    $empresasCadastradas = $barbeariaDAO->listarEmpresas($_SESSION['id']);
    $msg[3] = "<div style='color: green;margin-top: 5%; font-weight: bold;'>Empresa excluída com sucesso!</div>";
}

//$empresasCadastradas = $barbeariaDAO->listarEmpresas($_POST['id_dono']); // Passando o ID do dono para buscar as empresas relacionadas
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
                    <p>clique em mais para cadastrar</p>
                    <a href="#" id="abrirModalBtn"><img width="42px" src="../imagens/iconizer-maisSVG.svg"></a>
                </div>
            </div>
        </section>

        <div class="mensagens">
            <?php
            // Exibe mensagens de erro ou sucesso
            foreach ($msg as $message) {
                if (!empty($message)) {
                    echo $message . "<br>";
                }
            }
            ?>
        </div>
            
        <!-- Modal com formulário de cadastro -->
        <div id="modal" class="modal">
            <div class="modal-conteudo">
                <span class="fechar" id="fecharModalBtn">&times;</span>
                <h2>Cadastro de Empresa</h2>
                <form action="cadastroBarbearia.php" method="POST">
                    <input type="text" name="nome" placeholder="Nome da Empresa" value="<?php echo $_POST['nome'] ?? ''; ?>" required><br>
                    <input type="text" name="endereco" placeholder="Endereço" value="<?php echo $_POST['endereco'] ?? ''; ?>" required><br>
                    <input type="text" name="celular" placeholder="Celular" value="<?php echo $_POST['celular'] ?? ''; ?>" required><br>
                    <input type="text" name="cnpj" placeholder="CNPJ" value="<?php echo $_POST['cnpj'] ?? ''; ?>" required><br>
                    <input type="hidden" name="id_dono" value="<?php echo $_SESSION['id'] ?? '12'; ?>"> <!-- Verifica se há id_dono na sessão -->
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
                        <p class = "nomeBarb"><strong>Nome da Barbearia:</strong> <?php echo htmlspecialchars($empresa['nome']); ?></p>
                        <p><strong>Endereço:</strong> <?php echo htmlspecialchars($empresa['endereco']); ?></p>
                        <p><strong>Celular:</strong> <?php echo htmlspecialchars($empresa['celular']); ?></p>
                        <p><strong>CNPJ:</strong> <?php echo htmlspecialchars($empresa['cnpj']); ?></p>
                        <hr>
                        <form method="POST" action="cadastroBarbearia.php">
                            <input type="hidden" name="id_empresa" value="<?= htmlspecialchars($empresa['id_barbearia']); ?>">
                            <button type="submit" name="excluir" value="1">Excluir</button>
                        </form>
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
