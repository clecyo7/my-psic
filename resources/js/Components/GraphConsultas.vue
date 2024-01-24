<template>
    <div>
      <h2>CONSULTAS FINALIZADAS, AUSÊNCIAS E CANCELAMENTOS</h2>
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
          labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
          datasets: [
            {
              label: 'Consultas Finalizadas',
              data: [10, 20, 15, 25, 30, 18],
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderColor: 'rgba(75, 192, 192, 1)',
              borderWidth: 1,
            },
          ],
        };
  
        // Opções de configuração do gráfico
        const options = {
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        };
  
        // Criação do gráfico
        new Chart(ctx, {
          type: 'bar',  // Pode ajustar para o tipo de gráfico desejado
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
  