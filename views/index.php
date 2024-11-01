<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbearia Dark - Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <div class="container-header">
            <h1>Barbearia Dark</h1>
            <ul>
                <li><a href="../views/index.php">Home</a></li>
                <li><a href="../views/barbearia.php">Barbearias</a></li>
                <li><a href="../views/contato.php">Contato</a></li>
            </ul>
            <ul>
                <?php
                session_start();

                if (isset($_SESSION["id"])) {
                    echo "<li><a href='#'>Bem-vindo, " . htmlspecialchars($_SESSION["nome"]) . "</a></li>";
                }
                else 
                {
                    echo '<li><a href="../views/login.php" id="login">Login</a></li>';
                    echo '<li><a href="../views/cadastro.php" class="btn-cadastrar">Cadastrar-se</a></li>';
                }
                ?>
            </ul>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <h2>Estilo e elegância para o homem moderno</h2>
                <img src="imagens/barberdescricao.jpeg" alt="Imagem de Barbearia">
                <p>Transforme seu visual com nossos serviços especializados.</p>
                <a href="../views/agendamento.php" class="btn">Agende seu horário</a>
            </div>
        </section>

        <section id="unidades" class="unidades">
            <div class="container">
                <h2>Nossas Unidades</h2>
                <div class="unidades-lista">
                    <div class="unidade">
                        <h3>Barbearia Dark - Centro</h3>
                        <p>Endereço: Rua das Flores, 123 - Centro</p>
                        <p>Horário: Seg-Sáb, 09:00 - 18:00</p>
                        <a href="https://goo.gl/maps/centro" target="_blank">Ver no Maps</a>
                        <img src="imagens/unidade1.jpg" alt="Barbearia Dark Centro">
                    </div>
                    <div class="unidade">
                        <h3>Barbearia Dark - Bairro Norte</h3>
                        <p>Endereço: Av. Brasil, 456 - Bairro Norte</p>
                        <p>Horário: Seg-Sáb, 09:00 - 18:00</p>
                        <a href="https://goo.gl/maps/norte" target="_blank">Ver no Maps</a>
                        <img src="imagens/unidade2.jpg" alt="Barbearia Dark Bairro Norte">
                    </div>
                    <div class="unidade">
                        <h3>Barbearia Dark - Shopping Sul</h3>
                        <p>Endereço: Shopping Sul, Loja 789</p>
                        <p>Horário: Seg-Dom, 10:00 - 22:00</p>
                        <a href="https://goo.gl/maps/shoppingsul" target="_blank">Ver no Maps</a>
                        <img src="imagens/unidade3.jpg" alt="Barbearia Dark Shopping Sul">
                    </div>
                </div>
                <a href="../html/barbearia.html" class="btn">Ver Barbearias</a>
            </div>
        </section>

        <section id="avaliacoes" class="avaliacoes">
            <div class="avaliacoes">
                <h2>Avaliações dos Nossos Usuários:</h2>
                <div class="slider">
                    <div class="item">
                        <h3>Róger Alves</h3>
                        <p class="data">2023-07-17</p>
                        <p>Gostei muito da facilidade do agendamento! Top!</p>
                        <span class="estrela">★★★★★</span>
                    </div>
                    <div class="item">
                        <h3>Rafael Laurino Neto</h3>
                        <p class="data">2023-07-16</p>
                        <p>Atendimento excelente! Ficamos muito satisfeitos e voltaremos.</p>
                        <span class="estrela">★★★★★</span>
                    </div>
                    <div class="item">
                        <h3>Evandro Gonçalves</h3>
                        <p class="data">2023-07-13</p>
                        <p>São os melhores!!!</p>
                        <span class="estrela">★★★★★</span>
                    </div>
                    <button id="next">></button>
                    <button id="prev"><</button>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Barbearia Dark. Todos os direitos reservados.</p>
            <p><a href="agendamento.html">Agendar agora</a></p>
        </div>
    </footer>

    <script src="../js/script.js"></script>
</body>

</html>
