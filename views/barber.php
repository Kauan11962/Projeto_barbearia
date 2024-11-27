<?php
require_once "../models/Conexao.class.php";
require_once "../models/Barbearia.class.php";
require_once "../models/BarbeariaDAO.class.php";
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
            <?php
                if (isset($_GET['id_barbearia'])) {
                    $idBarbearia = intval($_GET['id_barbearia']); // Sanitiza o ID para evitar injeção SQL
                
                    // Consulta para obter os dados da barbearia
                    $dao = new BarbeariaDAO(); // Cria uma instância do DAO
                    $barbearia = $dao->buscarBarbeariaPorId($idBarbearia);
                
                    if ($barbearia) {
                        // Exibir detalhes da barbearia
                        ?>
                        <div class="barbearia-info">
                            <img src="../imagens/barbearias/<?php echo htmlspecialchars($barbearia['imagem']); ?>" alt="Imagem da Barbearia" width="100">
                            <div class="info-text">
                                <h2><?php echo htmlspecialchars($barbearia['nome']); ?> </h2>
                                <p><strong>Nome do Dono:</strong> <?php echo htmlspecialchars($barbearia['nome_dono']); ?></p>
                                <p><strong>Endereço:</strong><?php echo htmlspecialchars($barbearia['endereco']); ?> </p>
                                <p><strong>Celular:</strong> <?php echo htmlspecialchars($barbearia['celular']); ?></p>

                                <p><strong>CNPJ:</strong> <?php echo htmlspecialchars($barbearia['cnpj']); ?></p>
                                <p><strong>Horário:</strong></p>
                                <ul>
                                    <li><?php echo htmlspecialchars($barbearia['horario']); ?></li>
                                </ul>
                                <p><strong>Descrição:</strong> <?php echo htmlspecialchars($barbearia['descricao']); ?></p>
                                <p><strong>Instagram:</strong> 
                                    <a href="https://instagram.com/<?php echo htmlspecialchars($barbearia['instagram']); ?>" target="_blank">
                                        <?php echo htmlspecialchars($barbearia['instagram']); ?>
                                    </a>
                                </p>
                                <div class="avaliacao">
                                    <p><strong>Avaliação:</strong></p>
                                    <span>4.9</span>
                                    <div class="stars">
                                        &#9733; &#9733; &#9733; &#9733; &#9733;
                                    </div>
                                    <p>Baseado em 631 avaliações</p>
                                </div>
                                <a href="#nossos-valores" class="btn">Agendar Agora</a>
                            </div>
                        </div>
                        <?php
                    } else {
                        echo "<p>Barbearia não encontrada.</p>";
                    }
                } else {
                    echo "<p>ID de barbearia não fornecido.</p>";
                }
            ?>   
        </div>
    </section>
    <a href="../views/barbearia.php">Voltar</a>
    <!-- Seção Nossos Serviços -->
    <section class="servicos">
        <h2>Nossos Serviços</h2>
        <div class="container-servicos">
            <div class="servico">
                <h3>Barba</h3>
                <p>Modelagem e cuidados especiais para barba com produtos de alta qualidade.</p>
            </div>
            <div class="servico">
                <h3>Corte de Cabelo</h3>
                <p>Cortes modernos e clássicos para todos os tipos de cabelo.</p>
            </div>
            <div class="servico">
                <h3>Sobrancelha</h3>
                <p>Design de sobrancelhas que destaca sua expressão natural.</p>
            </div>
        </div>
        <div class="container-servicos">
            <div class="servico">
                <h3>Relaxamento</h3>
                <p>Tratamento capilar para alisar e cuidar da saúde dos fios.</p>
            </div>
            <div class="servico">
                <h3>Massagem Facial</h3>
                <p>Massagem relaxante para revitalizar o rosto e promover o bem-estar.</p>
            </div>
            <div class="servico">
                <h3>Tratamento Capilar</h3>
                <p>Hidratação e cuidados intensivos para manter seu cabelo saudável.</p>
            </div>
        </div>
    </section>
     <!-- Seção Nossos Valores -->
     <section id="nossos-valores" class="servicos-detalhes">
        <div class="container-valores">
            <h2>Nossos Valores</h2>

            <div class="servico-detalhe">
                <div>
                    <h3>Barba</h3>
                    <p>Desde o corte clássico até o design moderno, cuidamos da sua barba com os melhores produtos e técnicas.</p>
                    <p><strong>Preço:</strong> R$ 30,00</p>
                </div>
                <a href="../views/agendamento.php" class="btn agendar">Agendar</a>
            </div>

            <div class="servico-detalhe">
                <div>
                    <h3>Cabelo</h3>
                    <p>Oferecemos cortes personalizados que se adequam ao seu estilo. Modernos ou tradicionais, você escolhe.</p>
                    <p><strong>Preço:</strong> R$ 50,00</p>
                </div>
                <a href="../views/agendamento.php" class="btn agendar">Agendar</a>
            </div>

            <div class="servico-detalhe">
                <div>
                    <h3>Sobrancelha</h3>
                    <p>Design de sobrancelhas masculino, garantindo um visual alinhado e impactante.</p>
                    <p><strong>Preço:</strong> R$ 20,00</p>
                </div>
                <a href="../views/agendamento.php" class="btn agendar">Agendar</a>
            </div>

            <div class="servico-detalhe">
                <div>
                    <h3>Relaxamento</h3>
                    <p>Tratamento capilar para relaxar os fios e proporcionar maciez e brilho.</p>
                    <p><strong>Preço:</strong> R$ 60,00</p>
                </div>
                <a href="../views/agendamento.php" class="btn agendar">Agendar</a>
            </div>

            <div class="servico-detalhe">
                <div>
                    <h3>Massagem Facial</h3>
                    <p>Massagem relaxante para aliviar o estresse e proporcionar bem-estar.</p>
                    <p><strong>Preço:</strong> R$ 40,00</p>
                </div>
                <a href="../views/agendamento.php" class="btn agendar">Agendar</a>
            </div>

            <div class="servico-detalhe">
                <div>
                    <h3>Tratamento Capilar</h3>
                    <p>Hidratação profunda e tratamento especializado para garantir cabelos saudáveis.</p>
                    <p><strong>Preço:</strong> R$ 70,00</p>
                </div>
                <a href="../views/agendamento.php" class="btn agendar">Agendar</a>
            </div>

        </div>
    </section>
    <!-- Nova Seção: Prestadores -->
    <section id="prestadores" class="prestadores">
        <h2>Equipe de Prestadores</h2>
        <div class="container-cards">
            <!-- Aqui será exibido um exemplo estático. Você pode integrá-lo ao banco de dados -->
            <div class="card">
                <div class="imge">
                <div class="Usericon">
                    <img src="../imagens/barbearias/barberialogo.avif" alt="Foto do usuário" id="ftbarber">
                </div>
                    <p class="UserName">João Silva</p>
                    <p class="Id">Barbeiro</p>
                </div>
                <div class="Description">
                    <img src="../imagens/clientes/brad.webp" alt="Foto de exemplo" id="ftclt">
                </div>
                <div class="social-media">
                    <a href="#"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M459.37..."></path></svg></a>
                    <a href="#"><svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M224.1..."></path></svg></a>
                    <a href="#"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M504..."></path></svg></a>
                    <a href="#"><svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M100.28..."></path></svg></a>
                </div>
            </div>
            <div class="card">
                <div class="imge">
                <div class="Usericon">
                    <img src="../imagens/barbearias/barberialogo.avif" alt="Foto do usuário" id="ftbarber">
                </div>
                    <p class="UserName">João Silva</p>
                    <p class="Id">Barbeiro</p>
                </div>
                <div class="Description">
                    <img src="../imagens/clientes/brad.webp" alt="Foto de exemplo" id="ftclt">
                </div>
                <div class="social-media">
                    <a href="#"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M459.37..."></path></svg></a>
                    <a href="#"><svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M224.1..."></path></svg></a>
                    <a href="#"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M504..."></path></svg></a>
                    <a href="#"><svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M100.28..."></path></svg></a>
                </div>
            </div>
            <div class="card">
                <div class="imge">
                <div class="Usericon">
                    <img src="../imagens/barbearias/barberialogo.avif" alt="Foto do usuário" id="ftbarber">
                </div>
                    <p class="UserName">João Silva</p>
                    <p class="Id">Barbeiro</p>
                </div>
                <div class="Description">
                    <img src="../imagens/clientes/brad.webp" alt="Foto de exemplo" id="ftclt">
                </div>
                <div class="social-media">
                    <a href="#"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M459.37..."></path></svg></a>
                    <a href="#"><svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M224.1..."></path></svg></a>
                    <a href="#"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M504..."></path></svg></a>
                    <a href="#"><svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M100.28..."></path></svg></a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
    require_once "../views/footer.php";
?>

<!-- Modal de Agendamento -->
<div id="agendamentoModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="fecharModal()">&times;</span>
        <h2>Escolha a data e horário</h2>
        
        <!-- Navegação de Datas -->
        <div class="navegacao-datas">
            <button class="seta" onclick="mudarData(-1)">&#8592;</button>
            <span id="dataAtual"></span>
            <button class="seta" onclick="mudarData(1)">&#8594;</button>
        </div>
        
        <!-- Seleção de Profissional -->
        <div class="profissionais">
            <h3>Selecione o profissional</h3>
            <div class="lista-profissionais">
                <img src="../imagens/clientes/calleri.jpeg" alt="Profissional 1" onclick="selecionarProfissional(1)">
                <img src="../imagens/clientes/messi.jpg" alt="Profissional 2" onclick="selecionarProfissional(2)">
                <img src="../imagens/clientes/nj.jpg" alt="Profissional 3" onclick="selecionarProfissional(3)">
            </div>
        </div>
        <!-- Horários Disponíveis -->
        <div id="horarios" class="horarios">
            <h3>Horários Disponíveis</h3>
            <div class="lista-horarios" id="listaHorarios"></div>
        </div>   
</div>


<script src="../js/barber.js"></script>



</body>
</html>
