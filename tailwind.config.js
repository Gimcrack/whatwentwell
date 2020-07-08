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
        fontFamily: {
            'heading': ['Gloria\\ Hallelujah']
        },
        fontSize: {
            'xs': '.75rem',
            'sm': '.875rem',
            'base': '1rem',
            'lg': '1.125rem',
            'xl': '1.25rem',
            '2xl': '1.5rem',
            '3xl': '1.875rem',
            '4xl': '2.25rem',
            '5xl': '3rem',
            '6xl': '4rem',
            '7xl': '5rem',
            '8xl': '6rem',
        },
        extend: {}
    },
    variants: {
        backgroundColor: ['dark', 'dark-focus', 'dark-active', 'dark-hover', 'dark-group-hover', 'dark-even', 'dark-odd', 'active', 'focus', 'disabled', 'hover'],
        borderColor: ['dark', 'dark-focus', 'dark-focus-within', 'dark-active', 'active', 'focus', 'disabled', 'hover'],
        textColor: ['dark', 'dark-focus', 'dark-hover', 'dark-active', 'dark-placeholder', 'active', 'focus', 'disabled', 'hover']
    },
    plugins: [
        require('tailwindcss-dark-mode')(),
        require('@tailwindcss/custom-forms'),
        require('tailwind-buttons'),
    ]
}
