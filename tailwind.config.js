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
        raleway : "'Raleway', sans-serif",
       },
      colors: {
       'custom-white' : "#DFDFDF",
       'custom-dark-1000' : "#131313",
       'custom-dark-900': "#1B1B1B",       
       'custom-dark-800' : "#252525",
       'custom-dark-600' : "#898989",
       'custom-dark-500' : "#C8C8C8",
       'custom-dark-700' : "#313131",
       
       'custom-light-blue' : "#A4C2FD",
       'custom-white-p' : "#D6D6D6",
       'custom-light-tint-blue' : "#D5DFE8",
       'custom-admin-dark' : "#1A1C1E",
       'custom-admin-dark-100' : "#303030",
       'custom-admin-bg' : "#EFF1F3",

       'custom-bg-dark' : "#1A1A1C",
       'custom-bg-light-dark' : "#252525",
       'custom-blue' : "#5D52EA",
       'custom-green' : "#B4FF91",
       'custom-dark-green' : "#0D630C",
       'custom-red': "#FF6477",
       'custom-pink': "#FC77AE",
       'custom-violet': "#6E6ADE",
       'custom-dark-blue' : "#264364",
      },
      borderRadius: {
        '80p' : '80px',
        '20' : '20px',
      },

      spacing: {
        '486' : '486px',
        '1440' : '1440px',
        '799' : '680px',
        '258' : '258px',
        '300' : '300px',
      },
      zIndex: {
        'n1': '-10',
      }
    
    },
  },
  plugins: [],
}

