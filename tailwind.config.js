import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */

export default {
    darkMode: 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
                montserrat: ['Montserrat', 'sans-serif'],
            },
            spacing: {
                '500': '500px',
                '100': '100px',
            },

            keyframes: {
                slidein: {
                    '0%, 100%': { transform: 'translateX(50px); opacity: .2' },
                    '100%': { transform: 'translateX(0px); opacity: 1' },
                },

                mslidein: {
                    '0%, 100%': { transform: 'translateX(-50px); opacity: .2' },
                    '100%': { transform: 'translateX(0px); opacity: 1' },
                },

                textslide: {
                    '0%, 100%': { transform: 'translateX(-170px)' },
                    '100%': { transform: 'translateX(0px)'},
                },

                drop: {
                    '0%, 100%': { transform: 'translateY(-140px); ' },
                    '100%': { transform: 'translateY(0px)' }
                },
            },

            animation: {
                slidein: 'slidein 1s ease-in-out',
                mslidein: 'mslidein 1s ease-in-out',
                textslide: 'textslide 1s ease-in-out',
                drop: 'drop 1s ease-in',
            }
        },
    },

    plugins: [forms, typography],
};
