import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vuePlugin from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        vuePlugin(),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/admin/app.js',
                'resources/js/deliveryMan/app.js',
                'resources/js/front/app.js',
                'resources/js/subAdmin/app.js',
                'resources/js/vendor/app.js',
            ],
            refresh: true,
        }),
    ],
});
