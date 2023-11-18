/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["index.html", "login.html", "./node_modules/flowbite/**/*.js"],
  darkMode: "class",
  theme: {
    extend: {
      fontFamily: {
        poppins: ["Poppins"],
      },
    },
  },
  plugins: [require("flowbite/plugin")],
};
