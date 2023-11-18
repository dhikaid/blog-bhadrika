/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/Views/*.php",
    "./app/Views/**/*.php",
    "./app/Views/**/**/*.php",
    "./app/Views/**/**/**/*.php",
  ],
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
