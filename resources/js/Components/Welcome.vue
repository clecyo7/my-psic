<script>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import GraphConvenios from './GraphConvenios.vue';
import GraphConsultas from './GraphConsultas.vue';
import GraphConsultasCancelad from './GraphConsultasCancelad.vue';
import Card from './Card.vue';

export default {
    components: {
        ApplicationLogo,
        GraphConvenios,
        GraphConsultas,
        GraphConsultasCancelad,
        Card
    },

    props: [
        'convenios'
    ],

    data() {
        return {
            listCard: [
                {
                    title: 'Pacientes cadastrados',
                    count: 20,
                    color: 'green',
                    icon: 'ri-arrow-up-circle-fill'
                },
                {
                    title: 'Pacientes cadastrados no último mês',
                    count: 15,
                    color: 'red',
                    icon: 'ri-arrow-up-circle-fill'
                },
                {
                    title: 'Consultas hoje (26/01)',
                    count: 10,
                    color: 'red',
                    icon: 'ri-arrow-up-circle-fill'
                },
                {
                    title: 'Convênios atendidos',
                    count: 40,
                    color: 'gray',
                    icon: 'ri-arrow-up-circle-fill'
                }
            ],
            grafico2: {
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
            },
            grafico3: {
                labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'], //this.convenios.labels
                datasets: [
                    {
                        label: 'Consultas Finalizadas',
                        data: [10, 20, 15, 25, 30, 18],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                    },
                ],
            },

            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
            options2: {
              ...this.options?.scales,
              x: {
              beginAtZero: true,
            },
            
            }
        }
    }
};
</script>

<template>
    <div class="p-8 lg:p-10 bg-white border-b border-gray-200">
        <!--card consultas-->
        <div class="grid grid-cols-6 lg:grid-cols-12  md:grid-cols-6 gap-4">
            <Card class="col-span-3" v-for="card in listCard" :title="card.title" :color="card.color" :count="card.count"
                :icon="card.icon" />
        </div>
        <div class="mt-6 grid grid-cols-12 gap-6">
            <GraphConvenios class="col-span-6" />
            <!-- <GraphConsultasCancelad class="col-span-6" /> -->
            <GraphConsultas class="col-span-6" :title="'Consultas Cancel'" :data="grafico2" :options="options2"
                :typeGrafic="'line'" />
            <GraphConsultas class="col-span-12" :title="grafico3.datasets[0].label" :data="grafico3" :options="options" />
        </div>
    </div>
</template>

<style scoped></style>
