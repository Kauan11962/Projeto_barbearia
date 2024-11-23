<?php
// Conectar ao banco e carregar as classes necessárias
require_once "../models/Conexao.class.php";
require_once "../models/Barbearia.class.php";
require_once "../models/BarbeariaDAO.class.php";
require_once "../views/header.php";
// Criar uma instância do barbeariaDAO
$barbeariaDAO = new barbeariaDAO();

// Obter todas as empresas cadastradas
$empresasCadastradas = $barbeariaDAO->listarTodasEmpresas();
?>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresas Cadastradas</title>
    <link rel="stylesheet" href="../css/barbeariaTeste.css">
</head>
<body>
    <main>
        <section id="EmpresasD">
            <div class="divH1">    
                <h1>Empresas Cadastradas</h1>
            </div>
            <div class="Corpo">
                <?php if (!empty($empresasCadastradas)) { ?>
                    <div id="empresasAcumuladas">
                        <ul>
                            <?php foreach ($empresasCadastradas as $empresa) { ?>
                                <li>
                                    <a href="../views/baberTeste.php?id_barbearia=<?php echo $empresa['id_barbearia']; ?>">
                                        <div class="FlexBarber">
                                            <div class="imgBaber">
                                                <img src="../imagens/barbearias/<?php echo htmlspecialchars($empresa['imagem']); ?>" alt="Imagem da Barbearia" width="100" height="100">
                                            </div>
                                            <div class="flexTeste">    
                                                <p class = "nomeBaber"><?php echo htmlspecialchars($empresa['nome']); ?></p>
                                                <p class = "p"><strong>Nome do Dono:</strong> <?php echo htmlspecialchars($empresa['nome_dono']); ?></p>
                                                <p class = "p"><strong>Endereço:</strong> <?php echo htmlspecialchars($empresa['endereco']); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } else { ?>
                    <p><strong>Nenhuma empresa cadastrada.</strong></p>
                <?php } ?>
                </div> 
        </section>
    </main>
    <?php require_once "../views/footer.php"; ?>
</body>
</html>

