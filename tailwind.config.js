const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                transparent: 'transparent',
                current: 'currentColor',
                'zen-blue': {
                    DEFAULT: '#577377',
                    '50': '#D4DEE0',
                    '100': '#C5D3D5',
                    '200': '#A8BCBF',
                    '300': '#8AA6AA',
                    '400': '#6D8F94',
                    '500': '#577377',
                    '600': '#41575A',
                    '700': '#2C3A3C',
                    '800': '#161E1F',
                    '900': '#010101'
                },
                'zen-brown': {
                    DEFAULT: '#C7988D',
                    '50': '#FCF9F9',
                    '100': '#F6EFED',
                    '200': '#EAD9D5',
                    '300': '#DFC3BD',
                    '400': '#D3AEA5',
                    '500': '#C7988D',
                    '600': '#B87C6E',
                    '700': '#A66252',
                    '800': '#885043',
                    '900': '#693E34'
                },
                'zen-lightblue': {
                    DEFAULT: '#ADBAB7',
                    '50': '#FFFFFF',
                    '100': '#FBFBFB',
                    '200': '#E7EBEA',
                    '300': '#D4DBD9',
                    '400': '#C0CAC8',
                    '500': '#ADBAB7',
                    '600': '#97A7A4',
                    '700': '#819590',
                    '800': '#6C807C',
                    '900': '#596A66'
                },
                'zen-whiteblue': {
                    DEFAULT: '#BAD2CF',
                    '50': '#FFFFFF',
                    '100': '#F8FAFA',
                    '200': '#E8F0EF',
                    '300': '#D9E6E4',
                    '400': '#C9DCDA',
                    '500': '#BAD2CF',
                    '600': '#A1C2BE',
                    '700': '#89B2AD',
                    '800': '#70A29B',
                    '900': '#5C8D87'
                },
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
