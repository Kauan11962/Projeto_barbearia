<?php
require_once "../views/headerDono.php";
require_once "../models/Conexao.class.php";
require_once "../models/Barbearia.class.php";
require_once "../models/barbeariaDAO.class.php";
require_once "../models/profissionalDAO.php";
require_once "../models/profissional.class.php";

if (!isset($_SESSION['msg'])) {
    $_SESSION['msg'] = ["", "", "", "", ""];
}

$msg = ["", "", "", ""];
$empresasCadastradas = [];
$erro = false;
$imgpadrao = "noimage.avif"; 
$imgcliente = "ftpadrao.webp"; 
$imagemPro = "ftpadrao.webp"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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
            idDono: $_POST["id_dono"],
        );

        $barbeariaDAO = new barbeariaDAO();
        $idBarbearia = $barbeariaDAO->cadastrar($barbearia); 
       
        $profissionais = $_POST['profissionais'] ?? [];
        $diretorio = "../imagens/barbearias/";

        foreach ($profissionais as $indice => $profissionalData) {

            $nomePro = $profissionalData['nomePro'] ?? '';
            $imagemPro = $imgpadrao; // Valor padrão

            if (isset($_FILES['profissionais']['tmp_name'][$indice]['imagemPro']) && 
                !empty($_FILES['profissionais']['tmp_name'][$indice]['imagemPro'])) {
                $imagemPro = basename($_FILES['profissionais']['name'][$indice]['imagemPro']);
                move_uploaded_file(
                    $_FILES['profissionais']['tmp_name'][$indice]['imagemPro'], 
                    $diretorio . $imagemPro
                );
            }

            $profissional = new Profissional(
                nomePro: $nomePro,          
                imagemPro: $imagemPro,            
                id_barbearia: $idBarbearia      
            );

        
        
        $profissionalDAO = new profissionalDAO();
        $profissionalDAO->inserir($profissional);
        
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
    //$msg[3] = "<div style='color: green; margin-top: 5%; font-weight: bold;'>Empresa excluída com sucesso!</div>";
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
                    <label for="text" id="label">Nome:</label>
                    <input type="text" name="nome" placeholder="Nome da Empresa" required><br>

                    <label for="text" id="label">Endereço:</label>
                    <input type="text" name="endereco" placeholder="Endereço" required><br>

                    <label for="text" id="label">Celular:</label>
                    <input type="text" name="celular" placeholder="Celular" required><br>

                    <label for="text" id="label">CNPJ:</label>
                    <input type="text" name="cnpj" placeholder="CNPJ" required><br>

                    <label for="text" id="label">Descrição:</label>
                    <input type="text" name="descricao" placeholder="Descrição da Empresa"><br>

                    <label for="text" id="label">Instagram:</label>
                    <input type="text" name="instagram" placeholder="@ do Instagram"><br>

                    <label for="text" id="label">Whatsapp:</label>
                    <input type="text" name="whatsapp" placeholder="Número do WhatsApp"><br>

                    <div id="funcionarios-container">
                        <div class="funcionario-group">
                            <input type="text" name="profissionais[0][nomePro]" placeholder="Nome do Funcionário" required>
                            <input type="file" name="profissionais[0][imagemPro]">
                        </div>
                        <button id="btn-funcionario" type="button" onclick="adicionarCampo()">+</button>
                    </div>




                    <label for="text" id="label">Horário:</label>
                    <textarea name="horario" placeholder="Descreva os horários da semana"></textarea>

                    <label for="imagem" id="label">Foto da Empresa:</label>
                    <input type="file" name="imagem" id="imagem"><br>

                    <input type="hidden" name="id_dono" value="<?php echo $_SESSION['id']; ?>">
                    <input type="hidden" name="id_barbearia" value="<?php echo $idBarbearia; ?>">
                    <input type="hidden" name="id_profissional" value="<?php echo $idProfissional; ?>">

                    <button type="submit">Confirmar Cadastro</button>
                </form>

            </div>
        </div>

        <?php if (!empty($empresasCadastradas)) { ?>
    <div id="empresasAcumuladas">
        <h3>Empresas Cadastradas:</h3>
        <ul>
            <?php foreach ($empresasCadastradas as $idBarbearia => $dados) { 
                $empresa = $dados[0]; // Dados da barbearia
            ?>
                <li>
                    <p><strong>Nome da Barbearia:</strong> <?php echo htmlspecialchars($empresa['nome_empresa']); ?></p>
                    <p><strong>Endereço:</strong> <?php echo htmlspecialchars($empresa['endereco']); ?></p>
                    <p><strong>Celular:</strong> <?php echo htmlspecialchars($empresa['celular']); ?></p>
                    <p><strong>CNPJ:</strong> <?php echo htmlspecialchars($empresa['cnpj']); ?></p>
                    <p><strong>Descrição:</strong> <?php echo htmlspecialchars($empresa['descricao']); ?></p>
                    <p><strong>Instagram:</strong> 
                        <a href="https://instagram.com/<?php echo htmlspecialchars($empresa['instagram']); ?>" target="_blank">
                            <?php echo htmlspecialchars($empresa['instagram']); ?>
                        </a>
                    </p>
                    <p><strong>WhatsApp:</strong> <?php echo htmlspecialchars($empresa['whatsapp']); ?></p>
                    <p><strong>Horários:</strong> <?php echo htmlspecialchars($empresa['horario']); ?></p>
                    <p>
                        <strong>Imagem da Barbearia:</strong><br>
                        <img src="../imagens/barbearias/<?php echo htmlspecialchars($empresa['imagem_empresa']); ?>" alt="Imagem da Barbearia" width="100">
                    </p>
                    
                    <!-- Listagem de Funcionários -->
                    <?php if (count($dados) > 1 || !empty($dados[0]['nome_profissional'])) { ?>
                        <h4>Funcionários:</h4>
                        <ul>
                            <?php foreach ($dados as $profissional) { ?>
                                <?php if (!empty($profissional['nome_profissional'])) { ?>
                                    <li>
                                        <p><strong>Nome:</strong> <?php echo htmlspecialchars($profissional['nome_profissional']); ?></p>
                                        <p>
                                            <img src="../imagens/barbearias/<?php echo htmlspecialchars($profissional['imagem_profissional']); ?>" 
                                                 alt="Imagem do Funcionário" width="80">
                                        </p>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    <?php } else { ?>
                        <p><em>Não há funcionários cadastrados.</em></p>
                    <?php } ?>

                    <!-- Botão de exclusão -->
                    <form action="cadastroBarbearia.php" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta empresa?');">
                        <input type="hidden" name="id_empresa" value="<?php echo $idBarbearia; ?>">
                        <button type="submit" name="excluir">Excluir Empresa</button>
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
