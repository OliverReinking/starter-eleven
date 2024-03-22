import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

// use the plugin v-tippy (https://thecodewarrior.github.io/Tippy.vue/getting-started.html)
import { TippyPlugin } from "tippy.vue";

const appName = import.meta.env.VITE_APP_NAME || 'Starter Eleven';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Application/${name}.vue`, import.meta.glob('./Application/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(TippyPlugin, {
                tippyDefaults: {}, // convenience to set tippy.js default props
            })
            .mount(el);
    },
    progress: {
        color: '#0EA5E9',
    },
});
