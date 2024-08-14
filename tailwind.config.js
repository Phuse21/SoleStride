/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        'white': '#FFFFFA',
        'black': '#060606',
        'primary': '#1891c8',
      },
      fontFamily: {
        'hanken': ['Hanken Grotesk', 'sans-serif'],
      },
      fontSize: {
        'xs': '0.75rem',
        '2xs': '0.625rem',
      },
      backgroundImage: {
        'gradient-dark': 'linear-gradient(#1e152e, #161616)',
      },

      keyframes: {
        // Keyframes for custom animations
        wave: {
          '0%, 100%': { transform: 'translateX(0)' },
          '50%': { transform: 'translateX(-20%)' },
        },
      },
      animation: {
        // Custom animation with Tailwind
        wave: 'wave 8s infinite',
      },
    },
  },
  plugins: [
    require('flowbite/plugin')({
      charts: true,
    }),
  ],
}
