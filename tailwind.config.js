/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["template/user/*.{php,js,html}","template/admin/*.{php,js,html}","./node_modules/flowbite/**/*.js"],
  theme: {
    extend: {
      colors: {
        'transparent': 'rgba(0,0,0,0.5)',
      },
      dropShadow: {
        'xxl': '5px 5px 3px rgba(0,0,0,0.2)',
      },
    },
  },
  plugins: [
    require('./node_modules/flowbite/plugin')
  ],
}
