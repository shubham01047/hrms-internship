import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/js/app.js',
      ],
      refresh: true,
    }),
  ],
<<<<<<< HEAD
});
=======
});
>>>>>>> 21c1abda0fcfd2775b6df4fb1cf884b177395a79
