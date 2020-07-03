// tailwind.config.js
const plugin = require('tailwindcss/plugin')

module.exports = function({ addUtilities, addComponents, e, prefix, config, theme }) {

    let buttonVariant = function buttonVariant(color) {
        let variant = {};
        variant[`.btn-${color}`] = {
            backgroundColor: theme(`colors.${color}.500`),

                '&:hover, &.btn-outline:hover, &.btn-3d:hover, &.btn-gradient:hover': {

                    backgroundImage : `linear-gradient(to bottom, ${theme('colors.' + color + '.500')}, ${theme('colors.' + color + '.600')})`,
                    color: theme(`colors.${color}.100`),
                },
                '&:active, &.btn-outline:active, &.btn-3d:active, &.btn-gradient:active': {
                    //backgroundColor: theme(`colors.${color}.800`),
                    backgroundImage : `linear-gradient(to bottom, ${theme('colors.' + color + '.600')}, ${theme('colors.' + color + '.800')})`
                },
                '&.btn-outline' : {
                    backgroundColor: 'transparent',
                    borderColor : theme(`colors.${color}.700`),
                    color: theme(`colors.${color}.700`)
                },
                '&.btn-3d' : {
                    borderBottomColor : theme(`colors.${color}.700`),
                },
                '&.btn-gradient' : {
                    backgroundImage : `linear-gradient(to bottom, ${theme('colors.' + color + '.400')}, ${theme('colors.' + color + '.700')}, ${theme('colors.' + color + '.800')} 99% )`
                }
            };

        return variant;
    }

    const buttons = {
        '.btn': {
            padding: '.5rem 1rem',
            borderRadius: '.25rem',
            fontWeight: '600',
            color: '#fff',
            boxShadow : '0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06) !important',
            transition : 'background 0.1s cubic-bezier(1,0,0,1)',
            display: 'inline-block',

            '&.btn-pill' : {
                borderRadius : '1000px',
            },

            '&:disabled' : {
                cursor : 'not-allowed',
                opacity : 0.5
            },

            '&.disabled' : {
                cursor : 'not-allowed',
                opacity : 0.5
            },
            '&.btn-outline' : {
                border: '1px solid black'
            },

            '&.btn-3d' : {
                borderBottomStyle : 'solid',
                borderBottomWidth : '4px'
            },

            '&.btn-xs' : {
                padding: '0.125rem 0.375rem',
                fontSize : '0.75rem',
                '&.btn-3d' : {
                    borderBottomStyle : 'solid',
                    borderBottomWidth : '1px'
                },
            },

            '&.btn-sm' : {
                padding: '0.25rem 0.5rem',
                fontSize : '0.875rem',
                '&.btn-3d' : {
                    borderBottomStyle : 'solid',
                    borderBottomWidth : '1px'
                },
            },

            '&.btn-base' : {

            },

            '&.btn-lg' : {
                padding: '0.75rem 1.5rem',
                fontSize : '1.125rem',
                '&.btn-3d' : {
                    borderBottomStyle : 'solid',
                    borderBottomWidth : '5px'
                },
            },

            '&.btn-xl' : {
                padding: '1rem 2rem',
                fontSize : '1.25rem',
                '&.btn-3d' : {
                    borderBottomStyle : 'solid',
                    borderBottomWidth : '6px'
                },
            },
        },

        ...buttonVariant('red'),
        ...buttonVariant('orange'),
        ...buttonVariant('yellow'),
        ...buttonVariant('green'),
        ...buttonVariant('teal'),
        ...buttonVariant('blue'),
        ...buttonVariant('indigo'),
        ...buttonVariant('purple'),
        ...buttonVariant('pink'),
        ...buttonVariant('gray'),
    }

    addComponents(buttons)
}
