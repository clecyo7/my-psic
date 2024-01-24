<script>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import GraphConvenios from './GraphConvenios.vue';
import GraphConsultas from './GraphConsultas.vue';
import GraphConsultasCancelad from './GraphConsultasCancelad.vue';

export default {
    components: {
        ApplicationLogo,
        GraphConvenios,
        GraphConsultas,
        GraphConsultasCancelad,
    },
};
</script>

<template>
    <div>
        <div class="p-8 lg:p-10 bg-white border-b border-gray-200">

            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4 gap-8">

                <div class="sm:col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
                    <!-- Gráfico: Principais Convênios -->
                    <GraphConvenios />
                </div>
                <div class="sm:col-span-6 md:col-span-2 lg:col-span-2 xl:col-span-2">
                    <!-- Gráfico: Consultas Canceladas -->
                    <GraphConsultasCancelad />
                </div>

                <div class="sm:col-span-4 md:col-span-4 lg:col-span-4">
                    <div class="grid grid-flow-row-dense grid-cols-4 ...">
                        <div class="">
                            <div class="lg:w-1/2 md:w-full">
                                <div class="custom-widget-style">
                                    <h3 id="mes_anterior_pacientes"
                                        class="text-primary text-center counter font-black mt-0 text-cyan-400">17
                                    </h3>
                                    <p class="text-muted mb-0 text-center">Pacientes cadastrados no último mês</p>
                                </div>
                            </div>
                        </div>
                        <div class="c">
                            <div class="lg:w-1/2 md:w-full">
                                <div class="custom-widget-style">
                                    <h3 id="total_pacientes"
                                        class="text-success counter text-center font-black mt-0 text-cyan-400">386
                                    </h3>
                                    <p class="text-muted mb-0 text-center">Pacientes cadastrados</p>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="lg:w-1/2 md:w-full">
                                <div class="custom-widget-style">
                                    <p class="text-muted mb-0 text-center">Consultas hoje (23/01)</p>
                                    <h3 id="eventos_hoje"
                                        class="text-success counter text-center font-black mt-0 text-cyan-400">0
                                    </h3>
                                    <small class="text-muted mb-0 text-center">Agendadas ou realizadas</small>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="lg:w-1/2 md:w-full">
                                <div class="custom-widget-style">
                                    <p class="text-muted mb-0 text-center">Convênios atendidos</p>
                                    <h3 id="convenios_atendidos"
                                        class="text-success counter text-center font-black mt-0 text-cyan-400">5
                                    </h3>
                                    <small class="text-muted mb-0 text-center">Nos últimos 6 meses</small>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>



                <div class="sm:col-span-4 md:col-span-1 lg:col-span-3">
                    <!-- Gráfico: Consultas -->
                    <GraphConsultas />
                </div>

            </div>
        </div>

        <!-- Outros elementos do dashboard podem ser adicionados aqui -->
    </div>
</template>

<style scoped>
.custom-widget-style {
    min-width: 100%;
    height: 150px;
    align-items: center;
    display: inline-grid;
    padding: 10px;
    border: 1px solid rgba(54, 64, 74, 0.08);
    border-radius: 5px;
    -moz-border-radius: 5px;
    background-clip: padding-box;
    margin-bottom: 20px;
    background-color: #ffffff;
    /* Substitua pela cor desejada */
}
</style>
