import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import dns from 'dns'
import basicSsl from '@vitejs/plugin-basic-ssl'


dns.setDefaultResultOrder('verbatim')
export default defineConfig({
    plugins: [
        basicSsl(),

        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/styles.css',
                'resources/js/index.js',
            ],
            refresh: true,
        }),

    ],
    server: {
        origin: 'https://purossas.com'
    }
});
