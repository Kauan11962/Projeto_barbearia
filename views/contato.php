<?php
require_once "../views/header.php"; 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - Barbearia Dark</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/contato.css">
</head>
<body>
    <main>
        <section class="contato">
            <div class="container">
                <h2>Fale Conosco</h2>
                <p>Entre em contato conosco através do formulário abaixo ou visite-nos em nosso endereço físico. Estamos prontos para atender suas dúvidas e agendar seu horário.</p>

                <form id="formContato">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="mensagem">Mensagem</label>
                        <textarea id="mensagem" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn">Enviar</button>
                </form>

                <div class="info-contato">
                    <h3>Nosso Endereço</h3>
                    <p>Rua das Barbas, 123 - Centro, São Paulo, SP</p>
                    <h3>Horário de Funcionamento</h3>
                    <p>Segunda a Sexta: 9h - 18h</p>
                    <p>Sábado: 9h - 14h</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Barbearia Dark. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>
</html>
