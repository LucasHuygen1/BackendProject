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
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    light: '#3b82f6',
                    DEFAULT: '#1D4ED8', 
                    dark: '#1e40af',
                },
                secondary: {
                    light: '#a78bfa',
                    DEFAULT: '#9333ea',
                    dark: '#7e22ce',
                },
            },
        },

    },

    plugins: [forms],
};
