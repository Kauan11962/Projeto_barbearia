// Função para abrir a modal de edição de perfil
function editarPerfil() {
    document.getElementById('modal-editar-perfil').style.display = 'flex';
}

// Função para fechar uma modal específica
function fecharModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

// Função para salvar o perfil após edição
function salvarPerfil() {
    // Pega o novo nome e preferências dos inputs
    const novoNome = document.getElementById('nome').value;
    const novasPreferencias = document.getElementById('preferencias').value;

    // Atualiza o nome e as preferências na página principal
    document.getElementById('nome-usuario').innerText = novoNome;
    document.getElementById('preferencias-usuario').innerText = `Preferências: ${novasPreferencias}`;

    // Atualiza a foto do usuário, se houver uma nova imagem selecionada
    const novaFotoInput = document.getElementById('foto-input');
    if (novaFotoInput.files && novaFotoInput.files[0]) {
        const novaFotoURL = URL.createObjectURL(novaFotoInput.files[0]);
        document.querySelector('.perfil-foto').src = novaFotoURL;
    }

    // Fecha a modal
    fecharModal('modal-editar-perfil');
}

// Função para redirecionar para a página de contato ao clicar em "Suporte e Ajuda"
function suporte() {
    window.location.href = "../html/contato.html";
}

// Função para redirecionar para a página de cadastro ao clicar em "Sair"
function sair() {
    window.location.href = "../html/cadastro.html";
}
