import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import path from 'node:path';


export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.ts'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@pages': path.resolve(__dirname, './resources/js/Pages'),
            '@app': path.resolve(__dirname, './resources/js/Application'),
            '@framework': path.resolve(__dirname, './resources/js/Framework'),
            '@infra': path.resolve(__dirname, './resources/js/Infra'),
            '@module': path.resolve(__dirname, './resources/js/Application/Modules'),
            '@domain': path.resolve(__dirname, './resources/js/Application/Domain'),
            'ziggy-js': path.resolve('vendor/tightenco/ziggy'),
        }
    }
});
