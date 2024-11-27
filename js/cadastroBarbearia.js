document.addEventListener('DOMContentLoaded', function() {
    // Seleciona os elementos do DOM
    const abrirModalBtn = document.getElementById('abrirModalBtn');
    const fecharModalBtn = document.getElementById('fecharModalBtn');
    const modal = document.getElementById('modal');

    // Função para abrir o modal
    abrirModalBtn.addEventListener('click', function(event) {
        event.preventDefault(); // Evita o comportamento padrão do link
        modal.style.display = 'block'; // Exibe o modal
    });

    // Função para fechar o modal
    fecharModalBtn.addEventListener('click', function() {
        modal.style.display = 'none'; // Fecha o modal
    });

    // Fecha o modal se clicar fora do conteúdo do modal
    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            modal.style.display = 'none'; // Fecha o modal
        }
    });
});

let contador = 1;

function adicionarCampo() {
    const container = document.getElementById('funcionarios-container');
    const novoGrupo = document.createElement('div');
    novoGrupo.className = 'funcionario-group';
    novoGrupo.id = `funcionario-${contador}`;

    novoGrupo.innerHTML = `
        <input type="text" name="profissionais[${contador}][nomePro]" placeholder="Nome do Funcionário" required>
        <input type="file" name="profissionais[${contador}][imagemPro]">
        <button type="button" onclick="removerCampo('funcionario-${contador}')">Remover</button>
    `;

    container.appendChild(novoGrupo);
    contador++;
}

function removerCampo(id) {
    const campo = document.getElementById(id);
    if (campo) {
        campo.remove();
    }
}


document.querySelectorAll('.abrirFormularioProfissionais').forEach(button => {
    button.addEventListener('click', () => {
        const idBarbearia = button.getAttribute('data-id');
        const form = document.getElementById(`form-${idBarbearia}`);
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    });
});

// Função para abrir o modal
function abrirModal(modalId) {
    document.getElementById(modalId).style.display = 'block';
}

// Função para fechar o modal
function fecharModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

// Fechar o modal se o usuário clicar fora da janela do modal
window.onclick = function(event) {
    var modal = document.getElementById("modal-editar-barbearia");
    if (event.target === modal) {
        modal.style.display = "none";
    }
}
