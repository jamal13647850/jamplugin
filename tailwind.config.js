module.exports = {
  content: ["./template/**/**.twig", "./template/**.html"],
  theme: {
    extend: {
      colors: {
        btnColor: '#61b82d',
        btnBorderColor: '#009a3c',
        mainSiteColor: '#A60A07',
        textColor1: '#272c6c',
        listeningOne: '#32b3c7'
      }
    },

  },
  plugins: [
    require('tailwindcss'),
    require('precss'),
    require('autoprefixer')
  ]
}
