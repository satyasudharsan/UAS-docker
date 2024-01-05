const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                abril   : ['Abril Fatface', 'serif'],
            },
            colors: {
                primary1: "#516B54",
                primary2: "#EBE8E5",
                primary3: "#B2936E",
                seconds1: "#CFD8B3",
                seconds2: "#538A58",
                seconds3: "#E2E0C1",
            },
        },
    },

    plugins: [require('@tailwindcss/forms'),],

};
