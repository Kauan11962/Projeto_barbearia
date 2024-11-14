// Dados simulados para agendamentos por semana
const ctxAgendamentos = document.getElementById('graficoAgendamentos').getContext('2d');
const graficoAgendamentos = new Chart(ctxAgendamentos, {
    type: 'bar',
    data: {
        labels: ['Semana 1', 'Semana 2', 'Semana 3', 'Semana 4'],
        datasets: [{
            label: 'Agendamentos',
            data: [30, 45, 50, 60],
            backgroundColor: '#4CAF50'
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    color: '#fff'
                }
            },
            x: {
                ticks: {
                    color: '#fff'
                }
            }
        },
        plugins: {
            legend: {
                display: false
            }
        }
    }
});

// Dados simulados para satisfação dos clientes
const ctxSatisfacao = document.getElementById('graficoSatisfacao').getContext('2d');
const graficoSatisfacao = new Chart(ctxSatisfacao, {
    type: 'pie',
    data: {
        labels: ['Muito Satisfeito', 'Satisfeito', 'Insatisfeito'],
        datasets: [{
            data: [60, 30, 10],
            backgroundColor: ['#4CAF50', '#FFC107', '#FF5722']
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                labels: {
                    color: '#fff'
                }
            }
        }
    }
});
