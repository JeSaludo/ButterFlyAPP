/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        lora : "'Lora', serif",
        roboto : "'Roboto', sans-serif",
        poppins : "'Poppins', sans-serif",
       },
       colors:{
        "dark-blue" : "#264364",
        "very-dark-blue" : "#2C385B",
        "brand" : "#374366",
       }
    },
  },
  plugins: [],

  
}

