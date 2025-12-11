import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import daisyui from 'daisyui';

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
                sans: ['Outfit', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                rfaf: {
                    navy: '#002855',
                    blue: '#003366',
                    gold: '#C5A059',
                    red: '#E30613',
                }
            }
        },
    },

    plugins: [forms, daisyui],

    daisyui: {
        themes: [
            {
                rfaf: {
                    "primary": "#003366",    // RFAF Blue
                    "secondary": "#C5A059",  // RFAF Gold
                    "accent": "#E30613",     // RFAF Red
                    "neutral": "#002855",    // RFAF Navy
                    "base-100": "#ffffff",   // White
                    "info": "#3abff8",
                    "success": "#36d399",
                    "warning": "#fbbd23",
                    "error": "#f87272",
                },
            },
            "light",
            "corporate"
        ],
    },
};
