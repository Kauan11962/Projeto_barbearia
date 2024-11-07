<?php
require_once "../views/header.php"; 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento - Barbearia Dark</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/agendamento2.css">
</head>
<body>
    <main>
        <section class="agendamento">
            <div class="container">
                <h2>Selecione um horário disponível</h2>
                <div id="tabelaHorarios"></div>

                <form id="formAgendamento" style="display:none;">
                    <h2>Agendar horário</h2>
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="servico">Serviço</label>
                        <select id="servico" required>
                            <option value="barba">Barba</option>
                            <option value="cabelo">Cabelo</option>
                            <option value="sobrancelha">Sobrancelha</option>
                        </select>
                    </div>
                    <button type="submit" class="btn">Confirmar Agendamento</button>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Barbearia Dark. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="../js/agendamento.js"></script>
</body>
</html>
