module.exports = {
  purge: {
      content: [
          './resources/views/**/*.blade.php',
          './resources/css/**/*.css',
      ],
      options: {
          whitelist: [
              '.mode-dark'
          ]
      }
  },
  theme: {
    extend: {}
  },
  variants: {
      backgroundColor: ['dark', 'dark-focus', 'dark-active', 'dark-hover', 'dark-group-hover', 'dark-even', 'dark-odd', 'active', 'focus','disabled'],
      borderColor: ['dark', 'dark-focus', 'dark-focus-within', 'dark-active', 'active', 'focus','disabled'],
      textColor: ['dark', 'dark-focus', 'dark-hover', 'dark-active', 'dark-placeholder', 'active', 'focus','disabled']
  },
  plugins: [
    require('tailwindcss-dark-mode')(),
    require('@tailwindcss/custom-forms'),
    require('tailwind-buttons'),
  ]
}
