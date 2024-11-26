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
    novoGrupo.innerHTML = `
        <input type="text" name="profissionais[${contador}][nomePro]" placeholder="Nome do Funcionário" required>
        <input type="file" name="profissionais[${contador}][imagemPro]">
    `;
    container.appendChild(novoGrupo);
    contador++;
}


// Função para remover um campo de funcionário
function removerCampo(botao) {
    // Remove o grupo de campos correspondente ao botão clicado
    botao.parentElement.remove();
}

document.querySelectorAll('.abrirFormularioProfissionais').forEach(button => {
    button.addEventListener('click', () => {
        const idBarbearia = button.getAttribute('data-id');
        const form = document.getElementById(`form-${idBarbearia}`);
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    });
});