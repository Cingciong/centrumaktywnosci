/** @type {import('tailwindcss').Config} */


export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            maxWidth: {
                '8xl': '88rem', // You can adjust this value as needed
            },
            colors: {
                'ss-gray-100': '#F5F6F8',
                'ss-gray-200': '#DBDFE8',
                'ss-gray-300': '#5B5B5B',
                'ss-gray-400': '#1D1D1D',
                'ss-green-100': '#C5D300',
                'ss-green-200': '#8CBE22',
                'ss-green-300': '#6BB42C',
                'ss-green-400': '#5AA21C',
                'ss-green-500': '#0E6332',
            },
            fontSize :{
                'ss-sm': "14px",
                'ss-base': "16px",
                'ss-lg': "24px",
            },
            screens: {
                'xs': '360px',
                '3xl': '1920px',
            },
            lineClamp: {}, // Add this line
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/line-clamp'),
    ],
}
