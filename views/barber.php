<?php
require_once "../views/header.php"; 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbearia Dark - Detalhes</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/barber.css">
</head>
<body>
<main>
    <section class="detalhes-barbearia">
        <div class="container">
            <div class="barbearia-info">
                <img src="imagens/barbearia1-grande.jpg" alt="Barbearia Centro">
                <div class="info-text">
                    <h2>RendezVous - Centro</h2>
                    <p><strong>Endereço:</strong> 309 Queen St W, Toronto, ON M5V 2A4, Canada</p>
                    <p><strong>Horário:</strong></p>
                    <ul>
                        <li>Segunda - Sexta: 10:00 - 20:00</li>
                        <li>Sábado: 10:00 - 18:00</li>
                        <li>Domingo: 11:00 - 18:00</li>
                    </ul>
                    <div class="avaliacao">
                        <p><strong>Avaliação:</strong></p>
                        <span>4.9</span>
                        <div class="stars">
                            &#9733; &#9733; &#9733; &#9733; &#9733;
                        </div>
                        <p>Baseado em 631 avaliações</p>
                    </div>
                    <a href="agendamento.php" class="btn">Agendar Agora</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Seção Nossos Serviços -->
    <section class="servicos">
        <h2>Nossos Serviços</h2>
        <div class="container-servicos">
            <div class="servico">
                <img src="icone-barba.png" alt="Barba">
                <h3>Barba</h3>
                <p>Modelagem e cuidados especiais para barba com produtos de alta qualidade.</p>
            </div>
            <div class="servico">
                <img src="icone-cabelo.png" alt="Cabelo">
                <h3>Corte de Cabelo</h3>
                <p>Cortes modernos e clássicos para todos os tipos de cabelo.</p>
            </div>
            <div class="servico">
                <img src="icone-sobrancelha.png" alt="Sobrancelha">
                <h3>Sobrancelha</h3>
                <p>Design de sobrancelhas que destaca sua expressão natural.</p>
            </div>
        </div>
        <div class="container-servicos">
            <div class="servico">
                <img src="icone-relaxamento.png" alt="Relaxamento">
                <h3>Relaxamento</h3>
                <p>Tratamento capilar para alisar e cuidar da saúde dos fios.</p>
            </div>
            <div class="servico">
                <img src="icone-massagem.png" alt="Massagem">
                <h3>Massagem Facial</h3>
                <p>Massagem relaxante para revitalizar o rosto e promover o bem-estar.</p>
            </div>
            <div class="servico">
                <img src="icone-tratamento.png" alt="Tratamento">
                <h3>Tratamento Capilar</h3>
                <p>Hidratação e cuidados intensivos para manter seu cabelo saudável.</p>
            </div>
        </div>
    </section>
     <!-- Seção Nossos Valores -->
     <section class="servicos-detalhes">
        <div class="container">
            <h2>Nossos Valores</h2>

            <div class="servico-detalhe">
                <img src="imagens/barba-detalhe.jpg" alt="Serviço de Barba">
                <div>
                    <h3>Barba</h3>
                    <p>Desde o corte clássico até o design moderno, cuidamos da sua barba com os melhores produtos e técnicas.</p>
                    <p><strong>Preço:</strong> R$ 30,00</p>
                </div>
            </div>

            <div class="servico-detalhe">
                <img src="imagens/cabelo-detalhe.jpg" alt="Serviço de Cabelo">
                <div>
                    <h3>Cabelo</h3>
                    <p>Oferecemos cortes personalizados que se adequam ao seu estilo. Modernos ou tradicionais, você escolhe.</p>
                    <p><strong>Preço:</strong> R$ 50,00</p>
                </div>
            </div>

            <div class="servico-detalhe">
                <img src="imagens/sobrancelha-detalhe.jpg" alt="Serviço de Sobrancelha">
                <div>
                    <h3>Sobrancelha</h3>
                    <p>Design de sobrancelhas masculino, garantindo um visual alinhado e impactante.</p>
                    <p><strong>Preço:</strong> R$ 20,00</p>
                </div>
            </div>

            <div class="servico-detalhe">
                <img src="imagens/relaxamento-detalhe.jpg" alt="Serviço de Relaxamento">
                <div>
                    <h3>Relaxamento</h3>
                    <p>Tratamento capilar para relaxar os fios e proporcionar maciez e brilho.</p>
                    <p><strong>Preço:</strong> R$ 60,00</p>
                </div>
            </div>

            <div class="servico-detalhe">
                <img src="imagens/massagem-detalhe.jpg" alt="Serviço de Massagem">
                <div>
                    <h3>Massagem Facial</h3>
                    <p>Massagem relaxante para aliviar o estresse e proporcionar bem-estar.</p>
                    <p><strong>Preço:</strong> R$ 40,00</p>
                </div>
            </div>

            <div class="servico-detalhe">
                <img src="imagens/tratamento-detalhe.jpg" alt="Serviço de Tratamento Capilar">
                <div>
                    <h3>Tratamento Capilar</h3>
                    <p>Hidratação profunda e tratamento especializado para garantir cabelos saudáveis.</p>
                    <p><strong>Preço:</strong> R$ 70,00</p>
                </div>
            </div>

            <a href="agendamento.php" class="btn">Agende seu horário</a>
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
