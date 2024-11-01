const horarios = [
    '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'
];
let horariosReservados = [];

function carregarHorarios() {
    const tabelaHorarios = document.getElementById('tabelaHorarios');
    tabelaHorarios.innerHTML = '';

    horarios.forEach(horario => {
        const horarioDiv = document.createElement('div');
        horarioDiv.className = 'horario';
        horarioDiv.textContent = horario;
        if (horariosReservados.includes(horario)) {
            horarioDiv.classList.add('reservado');
        } else {
            horarioDiv.addEventListener('click', () => selecionarHorario(horario));
        }
        tabelaHorarios.appendChild(horarioDiv);
    });
}

function selecionarHorario(horario) {
    document.getElementById('formAgendamento').style.display = 'block';
    document.getElementById('formAgendamento').onsubmit = (e) => {
        e.preventDefault();
        confirmarAgendamento(horario);
    };
}

function confirmarAgendamento(horario) {
    horariosReservados.push(horario);
    document.getElementById('formAgendamento').reset();
    document.getElementById('formAgendamento').style.display = 'none';
    carregarHorarios();
}

window.onload = carregarHorarios;
