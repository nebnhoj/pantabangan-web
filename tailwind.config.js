/** @type {import('tailwindcss').Config} */
export default {
 content: [
    './resources/**/*.vue',
    './resources/**/*.js',
    './resources/**/*.ts',
    './resources/**/*.blade.php',
  ],
  theme: {
    extend: {},
  },
  plugins: [require('daisyui')],
  daisyui: {
    themes: ["nord"],
  },
}

