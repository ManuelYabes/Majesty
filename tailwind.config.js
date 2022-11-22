/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["template/user/*.{php,js,html}","template/admin/*.{php,js,html}","./node_modules/flowbite/**/*.js"],
  theme: {
    extend: {
      colors: {
        'transparent': 'rgba(0,0,0,0.5)',
      },
      dropShadow: {
        'xxl': '0px 6px 6px rgba(0,0,0,0.3)',
      },
    },
  },
  plugins: [
    require('./node_modules/flowbite/plugin')
  ],
}
