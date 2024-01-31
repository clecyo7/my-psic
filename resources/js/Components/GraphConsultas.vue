<template>
    <div>
      <h2>{{title}}</h2>
      <canvas ref="chartCanvas"></canvas>
    </div>
  </template>
  
  <script>
  import Chart from 'chart.js/auto';  // Certifique-se de ter o Chart.js instalado no seu projeto
  
  export default {
    // recebendo o titulo do gráfico por props
    props: {
      title: {
      type: String, // tipo string
      default: ''  // se não tiver um campo string, por default será strign vazia
    },
    data: {
      type: Object,  // o data do gráfico será do tipo objeto, por default será um objeto vázio
      default: () => ({})
    },
    options: {
      type: Object,  // options do gráfico será do tipo objeto, por default será um objeto vázio
      default: () => ({})
    },
    typeGrafic: {
      type: String,   // o typeGrafic do gráfico será uma string, por default será um gráfico do tipo bar 
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
  // exemplo de data 
  // data: {
  //               labels: ['Dia 1', 'Dia 2', 'Dia 3', 'Dia 4', 'Dia 5', 'Dia 6', 'Dia 7'],
  //               datasets: [
  //                   {
  //                       label: 'Cancelamentos',
  //                       data: [5, 3, 8, 2, 7, 4, 6],
  //                       fill: false,
  //                       borderColor: 'rgba(255, 99, 132, 1)',
  //                       tension: 0.1,
  //                   },
  //                   {
  //                       label: 'Ausências',
  //                       data: [2, 4, 1, 5, 3, 6, 8],
  //                       fill: false,
  //                       borderColor: 'rgba(54, 162, 235, 1)',
  //                       tension: 0.1,
  //                   },
  //               ],
  //           },

  // exemplo de options 
  // options: {
  //               scales: {
  //                   y: {
  //                       beginAtZero: true,
  //                   },
  //               },
  //           },
  </script>
  
  
  