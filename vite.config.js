import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.scss',
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/admin.scss',
                'resources/js/admin.js',
                'resources/js/glide.js',
            ],
            refresh: true,
        }),
    ],
});
