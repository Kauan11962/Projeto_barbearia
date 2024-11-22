<?php
// Conectar ao banco e carregar as classes necessárias
require_once "../models/Conexao.class.php";
require_once "../models/Barbearia.class.php";
require_once "../models/barbeariaDAO.class.php";
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
            <h1>Empresas Cadastradas</h1>

            <?php if (!empty($empresasCadastradas)) { ?>
                <div id="empresasAcumuladas">
                    <ul>
                        <?php foreach ($empresasCadastradas as $empresa) { ?>
                            <li>
                                <p><strong>Nome da Barbearia:</strong> <?php echo htmlspecialchars($empresa['nome']); ?></p>
                                <p><strong>Nome do Dono:</strong> <?php echo htmlspecialchars($empresa['nome_dono']); ?></p>
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
                                <p><strong>Imagem:</strong> 
                                    <img src="../imagens/barbearias/<?php echo htmlspecialchars($empresa['imagem']); ?>" alt="Imagem da Barbearia" width="100">
                                </p>
                                <hr>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } else { ?>
                <p><strong>Nenhuma empresa cadastrada.</strong></p>
            <?php } ?>
        </section>
    </main>
    <?php require_once "../views/footer.php"; ?>
</body>
</html>

