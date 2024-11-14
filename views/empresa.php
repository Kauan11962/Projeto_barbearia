<?php
require_once "../views/header.php"; 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbearia Dark - Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/empresa.css">
</head>
<body>

    <main>
        <section class="promo-section">
            <div class="container-promo">
                <div class="promo-texto">
                    <h2>Vamos crescer juntos</h2>
                    <p>Empresas incríveis começam com pessoas incríveis. Estamos criando um grupo diversificado de pessoas inteligentes e apaixonadas pelo que fazem, que se sentem à vontade em ser como são, e que são motivadas pelo nosso objetivo em comum — melhorar a vida das pessoas por meio do melhor transporte do mundo.</p>
                    <a href="../views/cadastro2.php" class="btn-promo">Cadastre-se já!</a>
                </div>
                <div class="promo-imagem">
                    <img src="../imagens/barbershop-bro.png" alt="Imagem ilustrativa da empresa">
                </div>
            </div>
        </section>

        <section id="vantagens" class="vantagens">
            <div class="container">
                <h2>Vantagens de ser parceiro da 'nome do site'</h2>
                <div class="vantagens-lista">
                    <div class="vantagem">
                        <div class="vantagem-texto">
                            <h3>Aumente sua visibilidade e atraia novos clientes</h3>
                            <p>Ao se cadastrar em nosso site, sua barbearia estará disponível para uma rede de clientes que procuram por serviços de qualidade. Aumente sua presença online e permita que novos clientes descubram seu negócio com facilidade. Seja encontrado por aqueles que estão prontos para agendar!</p>
                        </div>
                        <div class="vantagem-footer">Vantagem 1</div>
                    </div>

                    <div class="vantagem">
                        <div class="vantagem-texto">
                            <h3>Agendamentos online para facilitar o seu dia </h3>
                            <p>Ofereça aos seus clientes a conveniência de agendar cortes e serviços diretamente pelo nosso site. Com o sistema de agendamentos fácil de usar, você pode otimizar sua agenda, reduzir falhas e garantir que seu fluxo de trabalho seja sempre eficiente.</p>
                        </div>
                        <div class="vantagem-footer">Vantagem 2</div>
                    </div>

                    <div class="vantagem">
                        <div class="vantagem-texto">
                            <h3>Controle completo do seu negócio </h3>
                            <p>Oferecemos a você o controle total sobre sua barbearia, desde a gestão de horários até a visualização de agendamentos. Receba feedback dos clientes e faça ajustes para sempre oferecer o melhor serviço. Transforme sua barbearia em um negócio ainda mais organizado e de sucesso!</p>
                        </div>
                        <div class="vantagem-footer">Vantagem 3</div>
                    </div>
                </div>
            </div>
        </section>


        <section id="estatisticas" class="estatisticas">
            <div class="container">
                <h2>Nossos Números</h2>
                <div class="estatisticas-cards">
                    
                    <!-- Card 1 -->
                    <div class="card-estatistica">
                        <img src="../imagens/handshake.svg" id="icon" alt="Ícone de Barbearias Cadastradas">
                        <h3>500+</h3>
                        <p>Barbearias cadastradas</p>
                    </div>

                    <!-- Card 2 -->
                    <div class="card-estatistica">
                        <img src="../imagens/Verified.svg" id="icon" alt="Ícone de Clientes Satisfeitos">
                        <h3>10.000+</h3>
                        <p>Clientes satisfeitos</p>
                    </div>

                    <!-- Card 3 -->
                    <div class="card-estatistica">
                        <img src="../imagens/calendar.svg" id="icon" alt="Ícone de Agendamentos">
                        <h3>95%</h3>
                        <p>Taxa de agendamentos bem-sucedidos</p>
                    </div>

                    <!-- Card 4 -->
                    <div class="card-estatistica">
                        <img src="../imagens/trend-up.svg" id="icon" alt="Ícone de Crescimento">
                        <h3>30%</h3>
                        <p>Aumento médio de clientes</p>
                    </div>

                </div>
            </div>
        </section>




        <section id="avaliacoes" class="avaliacoes">
            <div class="avaliacoes">
                <h2>Empresários de sucesso em nosso site</h2>
                <div class="slider">
                    <div class="item">
                        <h3>Bruno Pereira - Barbearia X</h3>
                        <p class="data">15/04/2024</p>
                        <p>"A plataforma foi essencial para aumentar a visibilidade da minha barbearia."</p>
                        <span class="estrela">★★★★★</span>
                    </div>
                    <div class="item">
                        <h3>Pedro Cazares - Barbearia Y</h3>
                        <p class="data">27/05/2024</p>
                        <p>"Cresci muito com a ajuda do site, o sistema de agendamento online é muito prático!"</p>
                        <span class="estrela">★★★★★</span>
                    </div>
                    <div class="item">
                        <h3>Vanessa Campos - Barbearia Z</h3>
                        <p class="data">21/05/2024</p>
                        <p>"Conseguir atrair novos clientes e fidelizar os antigos nunca foi tão fácil."</p>
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
            <p><a href="../views/agendamento.php">Agendar agora</a></p>
        </div>
    </footer>

    <script src="../js/script.js"></script>
</body>
</html>
