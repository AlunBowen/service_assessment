import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                
            ],
            refresh: true,
        }),
        vue({
            template: {
                compilerOptions: {
                    isCustomElement: (tag) => ['app'].includes(tag),
                  },
                transformAssetUrls: {
                    
                    base: null,
        
                   
                    includeAbsolute: false,
                },
            },
        }),
    ],
    build: {
        manifest: true,
    },  
    base: '/var/www/vhosts/tumbleweedandtwang.com',
    
});