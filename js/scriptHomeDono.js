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

