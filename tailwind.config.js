import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                // Deeper, more institutional greens
                'primary-green': '#0A5C42', 
                'primary-green-light': '#0F835F',
                'primary-green-dark': '#063B2A',
                // Elegant accents
                'gold-accent': '#D4AF37', // More refined gold
                'gold-accent-light': '#E5C665',
                'gold-accent-dark': '#A68929', // Darker shade for text
                // Neutrals
                'light-gray': '#F8FAFC', // Slate 50 for softer backgrounds
                'surface': '#FFFFFF',
            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                heading: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            boxShadow: {
                'subtle': '0 4px 20px -2px rgba(0, 0, 0, 0.05)',
                'elevated': '0 10px 30px -5px rgba(10, 92, 66, 0.08)',
            },
            borderRadius: {
                'xl': '0.75rem',
                '2xl': '1rem',
                '3xl': '1.5rem',
            },
            spacing: {
                '18': '4.5rem',
            }
        },
    },

    plugins: [forms],
};
