<?php
require_once "../views/headerDono.php"; 

//var_dump($_POST);


$msg = ["","","",""]; // Mensagens de erro ou sucesso
$empresasCadastradas = []; // Array para armazenar as empresas cadastradas
$erro = false; // Inicialize a variável $erro

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "../models/Conexao.class.php";   // Conexão com o banco
    require_once "../models/Barbearia.class.php";  // Modelo da Barbearia
    require_once "../models/barbeariaDAO.class.php";     // DAO para realizar operações no banco

    // Validação dos campos
    if (empty($_POST["nome"])) {
        $msg[0] = "Preencha o nome da empresa";
        $erro = true;
    }

    if (empty($_POST["endereco"])) {
        $msg[1] = "Preencha o endereço";
        $erro = true;
    }

    if (empty($_POST["telefone"])) {
        $msg[2] = "Preencha o telefone";
        $erro = true;
    }

    // Se não houver erro, continua o processo de cadastro
    if (!$erro) {
        // Criação do objeto Barbearia
        $barbearia = new Barbearia(nome: $_POST["nome"], endereco: $_POST["endereco"], telefone: $_POST["telefone"], idDono: $_POST["id_dono"]);
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
        $msg[3] = "<div style='color: green;margin-top: 5%; font-weight: bold;'>Empresa cadastrada com sucesso!</div>"; 
    }
}

// Recuperar as empresas cadastradas para o dono
require_once "../models/Conexao.class.php";  
require_once "../models/barbeariaDAO.class.php";
require_once "../models/Barbearia.class.php";
$barbeariaDAO = new barbeariaDAO();
$empresasCadastradas = $barbeariaDAO->listarEmpresas($_POST['id_dono']); // Passando o ID do dono para buscar as empresas relacionadas
?>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Empresa</title>
    <link rel="stylesheet" href="../css/styleDono.css">
</head>
<body>
    <main>
        <section id="EmpresasD">
            <div class="NovaEmpresa">
                <div class="Nova1">
                    <img width="180px" src="../imagens/Screenshot_2-removebg-preview.png">
                </div>
                <div class="Nova2">
                    <h1>Cadastre sua empresa</h1>
                    <p>clique em mais para cadastrar</p>
                    <a href="#" id="abrirModalBtn"><img width="42px" src="../imagens/mais.png"></a>
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
                <form action="homeDoDono.php" method="POST">
                    <input type="text" name="nome" placeholder="Nome da Empresa" value="<?php echo $_POST['nome'] ?? ''; ?>" required><br>
                    <input type="text" name="endereco" placeholder="Endereço" value="<?php echo $_POST['endereco'] ?? ''; ?>" required><br>
                    <input type="text" name="telefone" placeholder="Telefone" value="<?php echo $_POST['telefone'] ?? ''; ?>" required><br>
                    <input type="hidden" name="id_dono" value="<?php echo $_SESSION['id_dono'] ?? '12'; ?>"> <!-- Verifica se há id_dono na sessão -->
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
                        <p><strong>Nome:</strong> <?php echo htmlspecialchars($empresa['nome']); ?></p>
                        <p><strong>Endereço:</strong> <?php echo htmlspecialchars($empresa['endereco']); ?></p>
                        <p><strong>Telefone:</strong> <?php echo htmlspecialchars($empresa['telefone']); ?></p>
                        <hr>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <?php } ?>

        <script src="../js/scriptHomeDono.js"></script>

        

        <section id="avaliacoes" class="avaliacoes">
            <div class="avaliacoes">
                <h2>Avaliações dos Nossos Usuários:</h2>
                <div class="slider">
                    <div class="item">
                        <h3>Róger Alves</h3>
                        <p class="data">14/07/2024</p>
                        <p>Gostei muito da facilidade do agendamento! Top!</p>
                        <span class="estrela">★★★★★</span>
                    </div>
                    <div class="item">
                        <h3>Rafael Laurino Neto</h3>
                        <p class="data">16/07/2024</p>
                        <p>Atendimento excelente! Ficamos muito satisfeitos e voltaremos.</p>
                        <span class="estrela">★★★★★</span>
                    </div>
                    <div class="item">
                        <h3>Evandro Gonçalves</h3>
                        <p class="data">08/09/2024</p>
                        <p>São os melhores!!!</p>
                        <span class="estrela">★★★★★</span>
                    </div>
                    <button id="next">></button>
                    <button id="prev"><</button>
                </div>
            </div>
        </section>
    </main>

    <?php require_once "footer.php"; ?>

    <script src="../js/script.js"></script>
</body>
</html>
