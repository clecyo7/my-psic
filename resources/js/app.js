// app.js
import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import { validateCPF } from './validationUtils';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

// Criar a instância do aplicativo antes de usar
const app = createApp({});

// Configurar os filtros globais
app.config.globalProperties.$filters = {
    validateCPF,
};

// Configurar o aplicativo Inertia
createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const app = createApp({
            render: () => h(App, props), // Certifique-se de ter uma função de renderização definida
        });

        // Configurar filtros globais
        app.config.globalProperties.$filters = {
            validateCPF,
        };

        // Usar plugins
        app.use(plugin).use(ZiggyVue);

        // Montar o aplicativo
        app.mount(el);

        return app;
    },
    progress: {
        color: '#4B5563',
    },
});
