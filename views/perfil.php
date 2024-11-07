<?php
require_once "../views/header.php"; 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário - Barbearia Dark</title>
    <link rel="stylesheet" href="../css/perfil.css">
</head>
<body>
    <main>
        <h2>Perfil do Usuário</h2>
        <section class="perfil-container">
            <!-- Informações do usuário -->
            <div class="perfil-info">
                <img src="img/usuario.png" alt="Foto do Usuário" class="perfil-foto" id="foto-usuario">
                <h2 id="nome-usuario">Giuseppe Camoles</h2>
                <p id="preferencias-usuario">Preferências: Cortes de cabelo modernos, barba detalhada</p>
                <button onclick="editarPerfil()">Editar Perfil</button>
            </div>

            <!-- Opções do perfil -->
            <div class="perfil-opcoes">
                <h3>Opções</h3>
                <div class="opcao" onclick="visualizarFavoritos()">
                    <h4>Favoritos</h4>
                    <p>Verificar as barbearias favoritas</p>
                </div>
                <div class="opcao" onclick="visualizarHistorico()">
                    <h4>Histórico de Serviços</h4>
                    <p>Visualizar todos os serviços realizados</p>
                </div>
                <div class="opcao" onclick="suporte()">
                    <h4>Suporte e Ajuda</h4>
                    <p>Entre em contato com nosso suporte</p>
                </div>
                <div class="opcao" onclick="sair()">
                    <h4>Sair</h4>
                    <p>Sair dessa conta</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal para editar perfil -->
    <div id="modal-editar-perfil" class="modal">
        <div class="modal-content">
            <span class="close" onclick="fecharModal('modal-editar-perfil')">&times;</span>
            <h2>Editar Perfil</h2>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" value="Giuseppe Camoles">
            <label for="preferencias">Preferências:</label>
            <input type="text" id="preferencias" value="Cortes de cabelo modernos, barba detalhada">
            
            <!-- Campo para upload de foto -->
            <label for="foto-input">Foto de Perfil:</label>
            <input type="file" id="foto-input" accept="image/*">
            
            <button onclick="salvarPerfil()">Salvar</button>
        </div>
    </div>

    <!-- Modal para histórico de serviços -->
    <div id="modal-historico" class="modal">
        <div class="modal-content">
            <span class="close" onclick="fecharModal('modal-historico')">&times;</span>
            <h2>Histórico de Serviços</h2>
            <ul id="lista-historico">
                <li>Corte de Cabelo - 15/10/2024</li>
                <li>Barba - 20/10/2024</li>
                <li>Sobrancelha - 25/10/2024</li>
            </ul>
        </div>
    </div>

    <!-- Modal para favoritos -->
    <div id="modal-favoritos" class="modal">
        <div class="modal-content">
            <span class="close" onclick="fecharModal('modal-favoritos')">&times;</span>
            <h2>Favoritos</h2>
            <p>Lista das barbearias favoritas do usuário.</p>
            <!-- Adicione conteúdo relevante para favoritos aqui -->
        </div>
    </div>
    <script src="../js/perfil.js"></script>

</body>
</html>
