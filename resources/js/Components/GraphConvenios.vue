<!-- GraphConvenios.vue -->
<template>
    <div>
      <h2>PRINCIPAIS CONVÊNIOS - ÚLTIMOS 6 MESES</h2>
      <canvas ref="conveniosChart"></canvas>
    </div>
  </template>
  
  <script>
  import Chart from 'chart.js/auto';
  
  export default {
    mounted() {
      this.renderChart();
    },
    methods: {
      renderChart() {
        const ctx = this.$refs.conveniosChart.getContext('2d');
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Bradesco', 'Sulamerica', 'Amil'],
            datasets: [{
              label: 'Número de Pacientes',
              data: [50, 30, 20],
              backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(255, 206, 86, 0.2)'],
              borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(255, 206, 86, 1)'],
              borderWidth: 1,
            }],
          },
          options: {
            scales: {
              y: {
                beginAtZero: true,
              },
            },
          },
        });
      },
    },
  };
  </script>
  