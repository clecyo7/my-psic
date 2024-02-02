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
                    <div>
                        <p>{{ teste }}</p>
                        <div>
                            <label class="typo__label">Simple select / dropdown</label>
                            <multiselect v-model="value" :options="options" :multiple="true" :close-on-select="false"
                                :clear-on-select="false" :preserve-search="true" placeholder="Pick some" label="name"
                                track-by="name" :preselect-first="true">
                                <template slot="selection" slot-scope="{ values, search, isOpen }"><span
                                        class="multiselect__single" v-if="values.length" v-show="!isOpen">{{ values.length
                                        }} options selected</span></template>
                            </multiselect>
                            <pre class="language-json"><code>{{ value }}</code></pre>
                        </div>


                        <!-- Restante do seu formulário e lógica aqui -->
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
  
<script>
// import Multiselect from 'vue-multiselect';
// import 'vue-multiselect/dist/vue-multiselect.min.css';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import Multiselect from 'vue-multiselect'

export default {
    props: {
        teste: {
            type: Array,
            default: []
        }
    },
    components: {
        Multiselect,
        ApplicationLogo,
        AppLayout
    },
    data() {
        return {
            value: [],
            options: [
                { name: 'Vue.js', language: 'JavaScript' },
                { name: 'Adonis', language: 'JavaScript' },
                { name: 'Rails', language: 'Ruby' },
                { name: 'Sinatra', language: 'Ruby' },
                { name: 'Laravel', language: 'PHP' },
                { name: 'Phoenix', language: 'Elixir' }
            ]
        };
    },
    // Restante da lógica do componente aqui
};
</script>

