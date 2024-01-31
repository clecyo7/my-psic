<script>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import GraphConvenios from '../../Components/GraphConvenios.vue';
import GraphConsultas from '../../Components/GraphConsultas.vue';
import Card from '../../Components/Card.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

export default {
    props: {
        userCount: {
            type: Number,
            default: 0
        }
    },
    components: {
        ApplicationLogo,
        GraphConvenios,
        GraphConsultas,
        Card,
        AppLayout
    },

    data() {
        console.log('Valor da propriedade userCount:', this.userCount);
        return {
            listCard: [
                {
                    title: 'Pacientes cadastrados',
                    count: this.userCount,
                    colorText: 'bg-blue-100',
                    bgColor: 'text-blue-500',
                    color: 'blue',
                    icon: 'ri-user-fill'
                },
                {
                    title: 'Pacientes cadastrados no último mês',
                    count: 15,
                    colorText: 'bg-indigo-100',
                    bgColor: 'text-indigo-600',
                    icon: 'ri-profile-fill'
                },
                {
                    title: 'Consultas hoje (26/01)',
                    count: 10,
                    colorText: 'bg-orange-100',
                    bgColor: 'text-orange-600',
                    icon: 'ri-calendar-event-fill'
                },
                {
                    title: 'Convênios atendidos',
                    count: 40,
                    colorText: 'bg-emerald-100',
                    bgColor: 'text-emerald-700',
                    icon: 'ri-hospital-fill'
                }
            ],
            graphicCancelad: {
                title: 'Cancelamentos e Ausências nos Últimos 7 Dias',
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
            graphicFinished: {
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
            },
            graphicConvenios: {
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
            options2: {
                x: {
                    beginAtZero: true,
                },
            }
        };
    },
};
</script>





<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
           
                <div class="p-8 lg:p-10 bg-white border-b border-gray-200">
                    <!--card consultas-->
                    <div class="grid grid-cols-6 lg:grid-cols-12 md:grid-cols-6 gap-4">
                        <Card class="col-span-3" v-for="card in listCard" :title="card.title" :colorText="card.colorText"
                            :bgColor="card.bgColor" :count="card.count" :icon="card.icon" />
                    </div>
                    <!--end consultas-->
                    <!-- graficos  -->
                    <div class="mt-6 grid grid-cols-12 gap-6">
                        <GraphConsultas class="col-span-6" :title="'PRINCIPAIS CONVÊNIOS - ÚLTIMOS 6 MESES'"
                            :data="graphicConvenios" :options="options3" />
                        <GraphConsultas class="col-span-6" :title="'CANCELAMENTOS E AUSÊNCIAS - ÚLTIMOS 7 DIAS'"
                            :data="graphicCancelad" :options="options2" :typeGrafic="'line'" />
                        <GraphConsultas class="col-span-12" :title="'CONSULTAS FINALIZADAS, AUSÊNCIAS E CANCELAMENTOS'"
                            :data="graphicFinished" :options="options" />
                    </div>
                    <!-- end graficos  -->
                </div>

            </div>
        </div>
    </AppLayout>
</template>