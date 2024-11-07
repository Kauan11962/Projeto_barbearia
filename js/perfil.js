// Função para abrir a modal de edição de perfil
function editarPerfil() {
    document.getElementById('modal-editar-perfil').style.display = 'flex';
}

function sairPerfil() {
    document.getElementById('modal-sair').style.display = 'flex';
}

// Função para fechar uma modal específica
function fecharModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

// Função para redirecionar para a página de contato ao clicar em "Suporte e Ajuda"
function suporte() {
    window.location.href = "../views/contato.php";
}

// Função para redirecionar para a página de cadastro ao clicar em "Sair"
function logout() {

    

    window.location.href = "../views/logout.php";
}
