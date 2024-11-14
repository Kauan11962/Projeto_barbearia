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
                <h2>Estilo e elegância para o homem moderno</h2>
                <div class="banner">
                    <div class="banner-carrousel">
                        <figure>
                            <img src="../imagens/imagemBanner1.jpg" alt="Imagem de Barbearia">
                            <figcaption>
 
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="../imagens/imagemBanner2.jpg" alt="Imagem de Barbearia">
                            <figcaption>
                               
                            </figcaption>
                        </figure>
                        <figure>
                            <img src="../imagens/imagemBanner3.jpg" alt="Imagem de Barbearia">
                            <figcaption>
                               
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <p>Transforme seu visual com nossos serviços especializados.</p>



                <?php
                if (isset($_SESSION["id"])) {
                    echo "<a href='../views/barbearia.php' class='btn'>Agende seu horário</a>";
                } else {
                    echo "<a href='../views/login.php' class='btn'>Agende seu horário</a>";
                }
                ?>



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
                        <img src="../imagens/imagemIndex.jpg" alt="">
                        <a href="https://goo.gl/maps/centro" target="_blank"><img class="icon" src="../imagens/iconGoogleMaps.png" alt="Barbearia Dark Centro"></a>
                    </div>
                    <div class="unidade">
                        <h3>Barbearia Dark - Bairro Norte</h3>
                        <p>Endereço: Av. Brasil, 456 - Bairro Norte</p>
                        <p>Horário: Seg-Sáb, 09:00 - 18:00</p>
                        <img src="../imagens/imagemIndex.jpg" alt="">
                        <a href="https://goo.gl/maps/centro" target="_blank"><img class="icon" src="../imagens/iconGoogleMaps.png" alt="Barbearia Dark Centro"></a>
                    </div>
                    <div class="unidade">
                        <h3>Barbearia Dark - Shopping Sul</h3>
                        <p>Endereço: Shopping Sul, Loja 789</p>
                        <p>Horário: Seg-Dom, 10:00 - 22:00</p>
                        <img src="../imagens/imagemIndex.jpg" alt="">
                        <a href="https://goo.gl/maps/centro" target="_blank"><img class="icon" src="../imagens/iconGoogleMaps.png" alt="Barbearia Dark Centro"></a>
                    </div>
                </div>
                <a href="../views/barbearia.php" class="btn">Ver Barbearias</a>
            </div>
        </section>

        <section class="promo-section">
            <div class="container-promo">
                <div class="promo-texto">
                    <h2>Quer trabalhar<br> no NOME?</h2>
                    <p>Cadastre sua barbearia agora!</p>
                    <a href="../views/empresa.php" class="btn-promo">Saiba mais</a>
                </div>
                <div class="promo-imagem">
                    <img src="../imagens/barbershop.svg" alt="Imagem Promocional">
                </div>
            </div>
        </section>

        <section id="avaliacoes" class="avaliacoes">
            <div class="avaliacoes">
                <h2>Avaliações dos Nossos Usuários:</h2>
                <div class="slider">
                    <div class="item">
                        <h3>Róger Alves</h3>
                        <p class="data">14/07/2024</p>
                        <p>Gostei muito da facilidade do agendamento! Top!</p>
                        <span class="estrela">★★★★★</span>
                    </div>
                    <div class="item">
                        <h3>Rafael Laurino Neto</h3>
                        <p class="data">16/07/2024</p>
                        <p>Atendimento excelente! Ficamos muito satisfeitos e voltaremos.</p>
                        <span class="estrela">★★★★★</span>
                    </div>
                    <div class="item">
                        <h3>Evandro Gonçalves</h3>
                        <p class="data">08/09/2024</p>
                        <p>São os melhores!!!</p>
                        <span class="estrela">★★★★★</span>
                    </div>
                    <button id="next">></button>
                    <button id="prev"><</button>
                </div>
            </div>
        </section>
    </main>

    <?php require_once "footer.php"; ?>

    <script src="../js/script.js"></script>
    <script src="../js/banner.js"></script>
</body>
</html>
