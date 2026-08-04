import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            output: {
                manualChunks(id) {
                    // Split the large CKEditor bundle into its own chunk
                    if (id.includes('@ckeditor')) {
                        return 'ckeditor';
                    }
                    // Split Alpine.js into the vendor chunk
                    if (id.includes('alpinejs')) {
                        return 'vendor';
                    }
                },
            },
        },
        chunkSizeWarningLimit: 600,
    },
});
