module.exports = {
  // content: ["./src/**/*.{html,js}"],
  content: ['./templates/**/*.{twig,html,js}',
            './vendor/knplabs/knp-paginator-bundle/templates/*.{twig,html,js}'],
  theme: {
    extend: {
      colors: {
        'body': '#ffffff',
        'text': '#ad7171',
        'text-light': '#737374',
        'selected-text': '#A3A3A2',
        'primary': '#a21a53',
        'primary-light': '#be185d',
        'success': '#2cb304',
        'success-light': '#37bd0f',
        'neutral': '#FC9520',
        'neutral-light': '#FDA92E',
        'alert': '#e80000',
        'alert-light': '#EC4545',
        'warning': '#f6fa00',
        'warning-light': '#FBFF19',
        'footer': '#44403c',
        'nav': '#404053',
        'secondary': '#747474',
        'badge': '#3F3F51',
        'input-border': '#565666',
        'input': '#2A2A35'
      },
    },
    fontFamily: {
      Poppins: ["Poppins-Light, sans-serif"],
      Plex: ["Plex-Light, sans-serif"],
    },
    container: {
      center: true,
      screens: {
        lg: "1124px",
        xl: "1124px",
        "2xl" : "1124px"
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms')
  ],
}