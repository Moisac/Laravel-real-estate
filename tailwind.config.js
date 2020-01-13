module.exports = {
  theme: {
    screens: {
      'sm': '640px',
      // => @media (min-width: 640px) { ... }

      'md': '768px',
      // => @media (min-width: 768px) { ... }

      'lg': '1024px',
      // => @media (min-width: 1024px) { ... }

      'xl': '1280px',
      // => @media (min-width: 1280px) { ... }
    },

    extend: {
      width: {
        '96' : '24rem',
        '120': '30rem'
      },

      height: {
          sm: '8px',
          md: '16px',
          lg: '24px',
          xl: '48px',
          xxl: '500px'
        },

      colors: {
        primary: {
          '900': '#ff46a3',
          '600': '#ff66b3',
          '300': '#ff99cc'
        },

        secondary: {
          '900': '#8039ff',
          '800': '#8e4dff',
          '600': '#9e66ff',
          '300': '#be99ff'
        },

        third: {
          '900' : '#d52340',
          '500' : '#df3a55',
        },

        black: {
          '100': 'rgba(0,0,0, .3)',
        }
      },

      fontSize: {
        '7xl': '40px',
        '10xl': '200px'
      }
    }
  },
  variants: {},
  plugins: []
}
