<?php
require_once "../views/header.php"; 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbearias - Barbearia Dark</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/barbearia2.css">
</head>
<body>
<main>
<section class="barbearias">
        <div class="container">
            <h2>Nossas Barbearias</h2>
            <div class="card-pai">
                <div class="cards">
                    <div class="card">
                        <div class="card-front">
                            <img src="../imagens/pexels-photo-2076932.jpeg" alt="Barbearia 1">
                        </div>
                        <div class="card-back">
                            <h3>Barbearia Dark - Centro</h3>
                            <p><strong>Endereço:</strong> Rua das Flores, 123 - Centro</p>
                            <p><strong>Horário:</strong> Seg-Sáb, 09:00 - 18:00</p>
                            <p><strong>Telefone:</strong> +55 11 1234-5678</p>
                            <a href="../views/barber.php" class="btn">Veja Mais</a>
                        </div>
                    </div>
 
                    <div class="card">
                        <div class="card-front">
                            <img src="../imagens/barbearia2.jpg" alt="Barbearia 2">
                        </div>
                        <div class="card-back">
                            <h3>Barbearia Dark - Bairro Norte</h3>
                            <p><strong>Endereço:</strong> Av. Brasil, 456 - Bairro Norte</p>
                            <p><strong>Horário:</strong> Seg-Sáb, 09:00 - 18:00</p>
                            <p><strong>Telefone:</strong> +55 11 8765-4321</p>
                            <a href="#" class="btn">Veja Mais</a>
                        </div>
                    </div>
 
                    <div class="card">
                        <div class="card-front">
                            <img src="../imagens/barbearia3.jpg" alt="Barbearia 3">
                        </div>
                        <div class="card-back">
                            <h3>Barbearia Dark - Shopping Sul</h3>
                            <p><strong>Endereço:</strong> Shopping Sul, Loja 789</p>
                            <p><strong>Horário:</strong> Seg-Dom, 10:00 - 22:00</p>
                            <p><strong>Telefone:</strong> +55 11 1122-3344</p>
                            <a href="#" class="btn">Veja Mais</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-front">
                            <img src="../imagens/barbearia4.jpg" alt="Barbearia 4">
                        </div>
                        <div class="card-back">
                            <h3>Barbearia Dark - Centro</h3>
                            <p><strong>Endereço:</strong> Rua das Flores, 123 - Centro</p>
                            <p><strong>Horário:</strong> Seg-Sáb, 09:00 - 18:00</p>
                            <p><strong>Telefone:</strong> +55 11 1234-5678</p>
                            <a href="../views/barber.php" class="btn">Veja Mais</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-front">
                            <img src="../imagens/barbearia5.jpg" alt="Barbearia 5">
                        </div>
                        <div class="card-back">
                            <h3>Barbearia Dark - Centro</h3>
                            <p><strong>Endereço:</strong> Rua das Flores, 123 - Centro</p>
                            <p><strong>Horário:</strong> Seg-Sáb, 09:00 - 18:00</p>
                            <p><strong>Telefone:</strong> +55 11 1234-5678</p>
                            <a href="../views/barber.php" class="btn">Veja Mais</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-front">
                            <img src="../imagens/barbearia6.jpg" alt="Barbearia 6">
                        </div>
                        <div class="card-back">
                            <h3>Barbearia Dark - Centro</h3>
                            <p><strong>Endereço:</strong> Rua das Flores, 123 - Centro</p>
                            <p><strong>Horário:</strong> Seg-Sáb, 09:00 - 18:00</p>
                            <p><strong>Telefone:</strong> +55 11 1234-5678</p>
                            <a href="../views/barber.php" class="btn">Veja Mais</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- o pai fez isso daki -->
            <div class="next">
                <a href="barbearia.php"><button class="estou-aki">1</button></a>
                <a href="barbearia2.php"><button>2</button></a>
                <a href="barbearia3.php"><button>3</button></a>
                <a href="#"><button>...</button></a>
            </div>
            <!-- até aki -->
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