// Função para abrir o modal
function abrirModal() {
    document.getElementById("agendamentoModal").style.display = "block";
    atualizarData();
}

// Função para fechar o modal
function fecharModal() {
    document.getElementById("agendamentoModal").style.display = "none";
}

// Configurações iniciais de data
let data = new Date();
const diasSemana = ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"];
const meses = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];

// Função para atualizar a data no modal
function atualizarData() {
    const dataAtual = `${diasSemana[data.getDay()]}, ${data.getDate()} ${meses[data.getMonth()]}`;
    document.getElementById("dataAtual").innerText = dataAtual;
}

// Função para mudar data ao clicar nas setas
function mudarData(direcao) {
    data.setDate(data.getDate() + direcao);
    atualizarData();
}

// Função para selecionar o profissional
function selecionarProfissional(profissionalId) {
    const horariosDiv = document.getElementById("listaHorarios");
    horariosDiv.innerHTML = ""; // Limpa os horários anteriores

    // Gera horários com intervalos de 30 minutos das 9h às 18h
    let hora = 9;
    let minuto = 0;
    while (hora < 18 || (hora === 18 && minuto === 0)) {
        const horario = `${hora.toString().padStart(2, '0')}:${minuto.toString().padStart(2, '0')}`;
        const botaoHorario = document.createElement("button");
        botaoHorario.textContent = horario;
        botaoHorario.onclick = function () { alert(`Horário escolhido: ${horario} com o profissional ${profissionalId}`); };
        horariosDiv.appendChild(botaoHorario);

        // Incrementa 30 minutos
        minuto += 30;
        if (minuto === 60) {
            minuto = 0;
            hora++;
        }
    }
}

// Abrir o modal ao clicar no botão "Agendar Agora"
const botoesAgendar = document.querySelectorAll('.agendar');
botoesAgendar.forEach(botao => {
    botao.addEventListener('click', (event) => {
        event.preventDefault();
        abrirModal();
    });
});
