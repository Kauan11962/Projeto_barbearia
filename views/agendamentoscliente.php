<?php
require_once "../views/header.php"; 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbearia Dark - Agendamentos Marcados</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/agendamentosbarbeiro.css">
</head>

<section id="agendamentos-do-dia" class="agendamentos-do-dia">
    <div class="container">
        <h2>Agendamentos do Dia</h2>

        <!-- Filtros de Agendamento -->
        <div class="filtros">
            <label for="horario">Filtrar por horário:</label>
            <select id="horario">
                <option value="">Todos</option>
                <option value="manhã">Manhã</option>
                <option value="tarde">Tarde</option>
                <option value="noite">Noite</option>
            </select>

            <label for="servico">Filtrar por serviço:</label>
            <select id="servico">
                <option value="">Todos</option>
                <option value="corte">Corte de Cabelo</option>
                <option value="barba">Barba</option>
                <option value="sobrancelha">Sobrancelha</option>
            </select>

            <button id="aplicar-filtros" class="btn">Aplicar Filtros</button>
        </div>

        <!-- Tabela de Agendamentos -->
        <div class="tabela-agendamentos">
            <div class="tabela-header">
                <span>Funcionário</span>
                <span>Serviço</span>
                <span>Horário</span>
                <span>Preço</span>
            </div>

            <!-- Agendamento individual em cards -->
            <div class="tabela-linha" data-horario="manhã" data-servico="corte">
                <span class="barbeiro">João Silva</span>
                <span class="servico">Corte de Cabelo</span>
                <span class="horario">09:00</span>
                <span class="preco">R$40,00</span>
            </div>

            <div class="tabela-linha" data-horario="tarde" data-servico="barba">
                <span class="barbeiro">Ana Pereira</span>
                <span class="servico">Barba</span>
                <span class="horario">14:00</span>
                <span class="preco">R$20,00</span>
            </div>

            <div class="tabela-linha" data-horario="noite" data-servico="sobrancelha">
                <span class="barbeiro">Carlos Santos</span>
                <span class="servico">Sobrancelha</span>
                <span class="horario">18:30</span>
                <span class="preco">R$15,00</span>
            </div>

            <!-- Mais agendamentos podem ser adicionados aqui -->
        </div>
    </div>

    <script src="../js/agendabarbeiro.js"></script>
</section>

</body>
</html>