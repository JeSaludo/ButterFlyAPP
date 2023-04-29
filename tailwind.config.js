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
      colors: {
        'custom-white' : "#DFDFDF",
       'custom-dark-1000' : "#131313",
       'custom-dark-900': "#1B1B1B",       
       'custom-dark-800' : "#252525",
       'custom-dark-600' : "#898989",
       'custom-dark-500' : "#C8C8C8",
       'custom-dark-700' : "#313131",
       'custom-blue' : "#5D52EA",
       'custom-light-blue' : "#A4C2FD",
       'custom-white-p' : "#D6D6D6",
      },
      borderRadius: {
        '80p' : '80px',
      },
    
    },
  },
  plugins: [],
}

