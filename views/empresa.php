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
    <link rel="stylesheet" href="../css/style2.css">
</head>
<body>

    <main>
        <section class="hero">
            <div class="container">
                <h2>Cadastre sua empresa em nosso site!</h2>
                <img src="imagens/barberdescricao.jpeg" alt="Imagem de Barbearia com empresario">
                <p>Sua barbearia pede visibilidade pra vender mais</p>
                <a href="../views/cadastro2.php" class="btn">Cadastre-se já!</a>
            </div>
        </section>

        <section id="unidades" class="unidades">
            <div class="container">
                <h2>Vantagens de ser parceiro da 'nome do site'</h2>
                <div class="unidades-lista">
                    <div class="unidade">
                        <h3>Vantagem 1</h3>
                        <p>Aumente sua visibilidade e atraia novos clientes</p>
                        <p>Ao se cadastrar em nosso site, sua barbearia estará disponível para uma rede de clientes que procuram por serviços de qualidade. 
                        Aumente sua presença online e permita que novos clientes descubram seu negócio com facilidade. 
                        Seja encontrado por aqueles que estão prontos para agendar!</p>
                        <a href="https://goo.gl/maps/centro" target="_blank">Alguma coisa ae</a>
                        <img src="imagens/unidade1.jpg" alt="Barbearia Dark Centro">
                    </div>
                    <div class="unidade">
                        <h3>Vantegem 2</h3>
                        <p>Agendamentos online para facilitar o seu dia a dia</p>
                        <p>Ofereça aos seus clientes a conveniência de agendar cortes e serviços diretamente pelo nosso site.
                         Com o sistema de agendamentos fácil de usar, você pode otimizar sua agenda, reduzir falhas e garantir que seu fluxo de trabalho seja sempre eficiente.</p>
                        <a href="https://goo.gl/maps/norte" target="_blank">Ver no Maps</a>
                        <img src="imagens/unidade2.jpg" alt="Barbearia Dark Bairro Norte">
                    </div>
                    <div class="unidade">
                        <h3>Vantagem 3</h3>
                        <p>Controle completo do seu negócio na palma da mão</p>
                        <p>Nosso site oferece a você o controle total sobre sua barbearia, desde a gestão de horários até a visualização de agendamentos.
                         Acompanhe seu desempenho, receba feedback dos clientes e faça ajustes para sempre oferecer o melhor serviço. Transforme sua barbearia em um negócio ainda mais organizado e de sucesso!</p>
                        <a href="https://goo.gl/maps/shoppingsul" target="_blank">Ver no Maps</a>
                        <img src="imagens/unidade3.jpg" alt="Barbearia Dark Shopping Sul">
                    </div>
                </div>
                <a href="../html/barbearia.html" class="btn">Ver Barbearias</a>
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
            <p><a href="agendamento.html">Agendar agora</a></p>
        </div>
    </footer>

    <script src="../js/script.js"></script>
</body>
</html>
