<?php
require_once "../views/header.php"; 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbearia Dark - Minhas Unidades</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/minhasbarbearias.css">
</head>
<body>

    <main>
    <section id="minhas-barbearias" class="minhas-barbearias">
    <div class="container">
        <h2>Minhas Barbearias</h2>
        <p class="intro-text">Gerencie as informações de cada uma das suas unidades cadastradas abaixo. Edite detalhes, horários, serviços e mantenha sua barbearia sempre atualizada.</p>
        
        <div class="barbearias-lista">
            <!-- Card para cada barbearia cadastrada -->
            <div class="barbearia-card">
                <div class="barbearia-imagem">
                    <img src="imagem-barbearia.jpg" alt="Imagem da Barbearia">
                </div>
                <div class="barbearia-info">
                    <h3>Nome da Barbearia</h3>
                    <p class="endereco">Endereço: Rua Exemplo, 123</p>
                    <p class="horario">Horário de Funcionamento: 09:00 - 18:00</p>
                    <p class="descricao">Descrição: Barbearia moderna com foco em atendimento personalizado e estilo clássico.</p>
                    <div class="servicos">
                        <h4>Serviços Oferecidos</h4>
                        <ul>
                            <li>Corte de cabelo</li>
                            <li>Barba</li>
                            <li>Sobrancelha</li>
                        </ul>
                    </div>
                    <!-- Botões de ação -->
                    <div class="acoes">
                        <button class="btn editar">Editar</button>
                        <button class="btn visualizar">Visualizar</button>
                        <button class="btn excluir">Excluir</button>
                    </div>
                </div>
            </div>
            
            <!-- Repetir o card para cada unidade cadastrada -->
        </div>

        <a href="adicionar-barbearia.php" class="btn btn-adicionar">+ Adicionar Nova Barbearia</a>
    </div>
</section>

    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Barbearia Dark. Todos os direitos reservados.</p>
            <p><a href="../views/agendamento.php">Agendar agora</a></p>
        </div>
    </footer>

    <script src="../js/script.js"></script>
</body>
</html>
