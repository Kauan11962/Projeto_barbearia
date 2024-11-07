<?php
require_once "../views/header.php"; 
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas - Barbearia Dark</title>
    <link rel="stylesheet" href="../css/reservas.css">
</head>

<body>
    <section class="reservas-container">
        <h2>Agendamentos</h2>
        <div id="futuros" class="reservas">
            <h3>Agendamentos Futuros</h3>
            <ul id="lista-futuros">
                <!-- Agendamentos futuros vão aparecer aqui -->
            </ul>
        </div>
        <div id="historico" class="reservas">
            <h3>Histórico de Agendamentos</h3>
            <ul id="lista-historico">
                <!-- Histórico de agendamentos aparece aqui -->
            </ul>
        </div>
    </section>

    <script src="../js/reservas.js"></script>
</body>

</html>