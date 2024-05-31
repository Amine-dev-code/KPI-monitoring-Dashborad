/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./public/**/*.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  theme: {
    extend: {
      colors: {
        'prefered':'#D1D5DB'
      },
    },
  },
  theme: {
    fontFamily: {
      'sans': ['ui-sans-serif', 'system-ui'],
      'serif': ['ui-serif', 'Georgia'],
      'mono': ['ui-monospace', 'SFMono-Regular'],
      'display': ['Oswald'],
      'Poppins':['Poppins', 'sans-serif'],
      'body': ["Open Sans"],
      'comic':["Lucida, Grande, sans-serif"],
      'montserrat':['Montserrat', 'sans-serif']
    }
  },
  plugins: [],
}

