<?php
require_once "../models/Conexao.class.php";
require_once "../models/Barbearia.class.php";
require_once "../models/BarbeariaDAO.class.php";
require_once "../views/header.php";
// Criar uma instância do barbeariaDAO
$barbeariaDAO = new barbeariaDAO();

// Obter todas as empresas cadastradas
$empresasCadastradas = $barbeariaDAO->listarTodasEmpresas();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbearias - Barbearia Dark</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/barbearia2.css">
</head>
<body>
<main>
    <section id="barbearias" class="barbearias">
        <div class="container">
            <h2>Nossas Barbearias</h2>
            <div class="barbearias-grid">
                <?php if (!empty($empresasCadastradas)) { ?>
                    <?php foreach ($empresasCadastradas as $empresa) { ?>
                        <a href="../views/barber.php?id_barbearia=<?php echo $empresa['id_barbearia']; ?>">
                            <div class="barbearia-card">
                                    <img src="../imagens/barbearias/<?php echo htmlspecialchars($empresa['imagem']); ?>" alt="Imagem da Barbearia" width="100" height="100">
                                    <div class="barbearia-info">
                                        <h3><?php echo htmlspecialchars($empresa['nome']); ?></h3>
                                        <p><strong>Nome do Dono:</strong> <?php echo htmlspecialchars($empresa['nome_dono']); ?></p>
                                        <p><strong>Endereço:</strong> <?php echo htmlspecialchars($empresa['endereco']); ?></p>
                                    </div>
                                    <img src="../imagens/setaDireita.svg">
                            </div>
                        </a>
                    <?php } ?>
                <?php } else { ?>
                    <p><strong>Nenhuma empresa cadastrada.</strong></p>
                <?php } ?>
            </div>
        </div>
    </section>
</main>

<?php require_once "footer.php"; ?>
</body>
</html>
