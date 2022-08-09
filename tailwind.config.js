/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './app/Http/Livewire/**/*Table.php',
    './vendor/power-components/livewire-powergrid/resources/views/**/*.php',
    './vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php'
],
  theme: {
    screens: {
      'xs': '350px',
      'md': '668px',
      'lg': '1100px',
      'xl': '1400px',},
    container:{
      center:true,
      padding:'4rem'
    },
    extend: {},
  },
  plugins: [],
}
