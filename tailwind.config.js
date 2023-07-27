/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue'
    ],
    theme: {
        screens: {
            '2xl': { max: '1535px' },
            xl: { max: '1279px' },
            lg: { max: '1023px' },
            md: { max: '767px' },
            sm: { max: '639px' }
        }
    },
    plugins: []
}
