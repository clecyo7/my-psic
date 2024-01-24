
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Clinica

            </h2>

        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        <h1 class="page-title">Lista de Empresas</h1>
                        <table class="company-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Descrição</th>
                                    <th>Email Tenant</th>
                                    <!-- Adicione mais colunas conforme necessário -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="company in companies" :key="company.id">
                                    <td>{{ company.id }}</td>
                                    <td>{{ company.description }}</td>
                                    <td>{{ company.email_tenant }}</td>
                                    <!-- Adicione mais colunas conforme necessário -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!--div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First
                                name</label>
                            <div class="mt-2">
                                <input type="text" name="first-name" id="first-name" v-model="address.name" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last
                                name</label>
                            <div class="mt-2">
                                <input type="text" name="last-name" id="last-name" autocomplete="family-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                                address</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Country</label>
                            <div class="mt-2">
                                <select id="country" name="country" autocomplete="country-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option>United States</option>
                                    <option>Canada</option>
                                    <option>Mexico</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Street
                                address</label>
                            <div class="mt-2">
                                <input type="text" name="street-address" id="street-address" autocomplete="street-address"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                            <div class="mt-2">
                                <input type="text" name="city" id="city" autocomplete="address-level2"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="region" class="block text-sm font-medium leading-6 text-gray-900">State /
                                Province</label>
                            <div class="mt-2">
                                <input type="text" name="region" id="region" autocomplete="address-level1"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">ZIP / Postal
                                code</label>
                            <div class="mt-2">
                                <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                </div -->
                <!-- Current Profile Photo -->
                <h1>painel</h1>
                <div v-show="!photoPreview" class="mt-2">
                    <img src="../../../../public/storage/sistema/painel.png" class="">
                </div>
                <h1>agenda</h1>
                <div v-show="!photoPreview" class="mt-2">
                    <img src="../../../../public/storage/sistema/agenda.png" class="">
                </div>
                <h1>novo Agendamento</h1>
                <div v-show="!photoPreview" class="mt-2">
                    <img src="../../../../public/storage/sistema/novoAgendamento.png" class="">
                </div>
                <h1>buscar Agendamento</h1>
                <div v-show="!photoPreview" class="mt-2">
                    <img src="../../../../public/storage/sistema/buscarAgendamento.png" class="">
                </div>
                <h1>Lista de Espera</h1>
                <div v-show="!photoPreview" class="mt-2">
                    <img src="../../../../public/storage/sistema/listaEspera.png" class="">
                </div>
                <h1>Pacientes Aguardando</h1>
                <div v-show="!photoPreview" class="mt-2">
                    <img src="../../../../public/storage/sistema/pacientesAguardando.png" class="">
                </div>
                <h1>consultas</h1>
                <div v-show="!photoPreview" class="mt-2">
                    <img src="../../../../public/storage/sistema/consultas.png" class="">
                </div>
                <h1>pacientes</h1>
                <div v-show="!photoPreview" class="mt-2">
                    <img src="../../../../public/storage/sistema/pacientes.png" class="">
                </div>
                <h1>clinica</h1>
                <div v-show="!photoPreview" class="mt-2">
                    <img src="../../../../public/storage/sistema/dadosClinica.png" class="">
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';


export default {
    props: {
        companies: {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            address: {
                cep: '',
                logradouro: '',
                numero: '',
                bairro: '',
                complemento: '',
                cidade: '',
                uf: '',
            },
        };
    },

    components: { ApplicationLogo }
};
</script>

<style scoped>
.page-title {
    font-size: 24px;
    margin-bottom: 20px;
}

.company-table {
    width: 100%;
    border-collapse: collapse;
}

.company-table th,
.company-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.company-table th {
    background-color: #f2f2f2;
}
</style>
