/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        'white': '#FFFFFA',
        'black': '#060606',
      },
      fontFamily: {
        'hanken': ['Hanken Grotesk', 'sans-serif'],
      },
      fontSize: {
        'xs': '0.75rem',
        '2xs': '0.625rem',
      },
    },
  },
  plugins: [],
}

