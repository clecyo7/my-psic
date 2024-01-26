<template>
    <div>
      <h2>{{title}}</h2>
      <canvas ref="chartCanvas"></canvas>
    </div>
  </template>
  
  <script>
  import Chart from 'chart.js/auto';  // Certifique-se de ter o Chart.js instalado no seu projeto
  
  export default {
    props: {
      title: {
      type: String,
      default: '' 
    },
    data: {
      type: Object,
      default: () => ({})
    },
    options: {
      type: Object,
      default: () => ({})
    },
    typeGrafic: {
      type: String,
      default: 'bar' 
    }
    },

    mounted() {
      this.renderChart();
    },
  
    methods: {
      renderChart() {
        const ctx = this.$refs.chartCanvas.getContext('2d');
  
        // Criação do gráfico
        new Chart(ctx, {
          type: this.typeGrafic,  // Pode ajustar para o tipo de gráfico desejado
          data: this.data,
          options: this.options,
        });
      },
    },
  };
  </script>
  
  
  