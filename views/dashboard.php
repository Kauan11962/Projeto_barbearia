<?php
require_once "../views/headerDono.php"; 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbearia Dark - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<section id="dashboard" class="dashboard">
    <div class="container">
        <h2>Dashboard da Barbearia</h2>

        <!-- Cards Resumo -->
        <div class="resumo">
            <div class="card">
                <h3>Agendamentos do Dia</h3>
                <p class="quantidade" id="agendamentosDia">15</p>
            </div>
            <div class="card">
                <h3>Total de Clientes no Mês</h3>
                <p class="quantidade" id="clientesMes">120</p>
            </div>
            <div class="card">
                <h3>Avaliações Recentes</h3>
                <p class="quantidade" id="avaliacoesRecentes">32</p>
            </div>
            <div class="card">
                <h3>Serviços Realizados</h3>
                <p class="quantidade" id="servicosRealizados">95</p>
            </div>
        </div>

        <!-- Gráfico de Desempenho -->
        <div class="graficos">
            <div class="grafico">
                <h3>Agendamentos por Semana</h3>
                <canvas id="graficoAgendamentos"></canvas>
            </div>
            <div class="grafico">
                <h3>Satisfação dos Clientes</h3>
                <canvas id="graficoSatisfacao"></canvas>
            </div>
        </div>
    </div>
    
    <?php require_once "footer.php"; ?>

    <script src="../js/dashboard.js"></script>

</section>

</body>
</html>