document.addEventListener('DOMContentLoaded', () => {
    const futuros = [
        { id: 1, servico: 'Corte de Cabelo', data: '2024-11-20', horario: '15:00' },
        { id: 2, servico: 'Barba', data: '2024-11-25', horario: '10:00' }
    ];

    const historico = [
        { id: 3, servico: 'Sobrancelha', data: '2024-10-15', horario: '09:30' }
    ];

    const listaFuturos = document.getElementById('lista-futuros');
    const listaHistorico = document.getElementById('lista-historico');

    // Função para criar item de reserva
    function criarReservaItem(reserva, isFuturo) {
        const li = document.createElement('li');
        li.className = 'reserva-item';

        const info = document.createElement('h4');
        info.innerText = `${reserva.servico} - ${reserva.data} às ${reserva.horario}`;
        li.appendChild(info);

        const actions = document.createElement('div');
        actions.className = 'reserva-actions';

        if (isFuturo) {
            const editarBtn = document.createElement('button');
            editarBtn.innerText = 'Editar';
            editarBtn.onclick = () => editarReserva(reserva);
            actions.appendChild(editarBtn);

            const cancelarBtn = document.createElement('button');
            cancelarBtn.innerText = 'Cancelar';
            cancelarBtn.onclick = () => cancelarReserva(reserva, li);
            actions.appendChild(cancelarBtn);
        }

        li.appendChild(actions);
        return li;
    }

    // Função para renderizar as listas de agendamentos
    function renderizarListas() {
        listaFuturos.innerHTML = '';
        listaHistorico.innerHTML = '';

        futuros.forEach(reserva => {
            const item = criarReservaItem(reserva, true);
            listaFuturos.appendChild(item);
        });

        historico.forEach(reserva => {
            const item = criarReservaItem(reserva, false);
            listaHistorico.appendChild(item);
        });
    }

    // Função para editar uma reserva
    function editarReserva(reserva) {
        const novaData = prompt('Informe a nova data (AAAA-MM-DD):', reserva.data);
        const novoHorario = prompt('Informe o novo horário (HH:MM):', reserva.horario);
        if (novaData && novoHorario) {
            reserva.data = novaData;
            reserva.horario = novoHorario;
            renderizarListas();
        }
    }

    // Função para cancelar uma reserva
    function cancelarReserva(reserva, elemento) {
        if (confirm(`Deseja realmente cancelar o agendamento de ${reserva.servico} em ${reserva.data}?`)) {
            // Remove do futuro e adiciona ao histórico
            const index = futuros.findIndex(r => r.id === reserva.id);
            if (index > -1) {
                futuros.splice(index, 1);
                historico.push(reserva);
                renderizarListas();
            }
        }
    }

    // Inicializar as listas de agendamentos
    renderizarListas();
});
