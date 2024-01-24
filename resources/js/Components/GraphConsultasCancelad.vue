<template>
    <div>
      <h2>Cancelamentos e Ausências nos Últimos 7 Dias</h2>
      <canvas ref="chartCanvas"></canvas>
    </div>
  </template>
  
  <script>
  import Chart from 'chart.js/auto';  // Certifique-se de ter o Chart.js instalado no seu projeto
  
  export default {
    mounted() {
      this.renderChart();
    },
    methods: {
      renderChart() {
        const ctx = this.$refs.chartCanvas.getContext('2d');
  
        // Dados de exemplo para o gráfico
        const data = {
          labels: ['Dia 1', 'Dia 2', 'Dia 3', 'Dia 4', 'Dia 5', 'Dia 6', 'Dia 7'],
          datasets: [
            {
              label: 'Cancelamentos',
              data: [5, 3, 8, 2, 7, 4, 6],
              fill: false,
              borderColor: 'rgba(255, 99, 132, 1)',
              tension: 0.1,
            },
            {
              label: 'Ausências',
              data: [2, 4, 1, 5, 3, 6, 8],
              fill: false,
              borderColor: 'rgba(54, 162, 235, 1)',
              tension: 0.1,
            },
          ],
        };
  
        // Opções de configuração do gráfico
        const options = {
          scales: {
            x: {
              beginAtZero: true,
            },
            y: {
              beginAtZero: true,
            },
          },
        };
  
        // Criação do gráfico
        new Chart(ctx, {
          type: 'line',
          data: data,
          options: options,
        });
      },
    },
  };
  </script>
  
  <style scoped>
  /* Estilos específicos do componente aqui */
  </style>
  