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

function adicionarCampo() {
    // Seleciona o container onde os grupos de campos serão adicionados
    const container = document.getElementById('funcionarios-container');

    // Cria um novo div para o grupo de campos
    const novoGrupo = document.createElement('div');
    novoGrupo.classList.add('funcionario-group');

    // Adiciona os novos campos
    novoGrupo.innerHTML = `
        <input type="text" name="nome_pro" placeholder="Nome do funcionário">
        <input type="file" name="imagem_pro">
        <button type="button" id="btn-funcionario" onclick="removerCampo(this)">➖</button>
    `;

    // Adiciona o novo grupo de campos ao container
    container.appendChild(novoGrupo);
}

function removerCampo(botao) {
    // Remove o grupo de campos correspondente ao botão clicado
    botao.parentElement.remove();
}