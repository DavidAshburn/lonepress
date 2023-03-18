/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: ["./**/*.php"],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter var', ...defaultTheme.fontFamily.sans],
        'abril': ['Abril Fatface', 'cursive'],
        'garamond': ['Cormorant Garamond', 'serif'],
        'ebgaramond': ['EB Garamond', 'serif'],
        'inter': ['Inter Tight', 'sans-serif'],
        'montserrat': ['Montserrat', 'sans-serif'],
        'nunito': ['Nunito', 'sans-serif'],
        'playfair': ['Playfair Display', 'serif'],
        'tinos': ['Tinos', 'serif'],
      },
    },
  },
  plugins: [],
}