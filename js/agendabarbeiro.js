document.getElementById("aplicar-filtros").addEventListener("click", function() {
    const horarioSelecionado = document.getElementById("horario").value;
    const servicoSelecionado = document.getElementById("servico").value;

    const linhas = document.querySelectorAll(".tabela-linha");

    linhas.forEach((linha) => {
        const horario = linha.getAttribute("data-horario");
        const servico = linha.getAttribute("data-servico");

        // Condições para mostrar ou ocultar a linha
        const horarioMatch = horarioSelecionado === "" || horario === horarioSelecionado;
        const servicoMatch = servicoSelecionado === "" || servico === servicoSelecionado;

        if (horarioMatch && servicoMatch) {
            linha.style.display = "flex";
        } else {
            linha.style.display = "none";
        }
    });
});
