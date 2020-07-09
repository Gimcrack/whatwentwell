require('./bootstrap');
window.moment = require('moment-timezone');

window.livewire.on('UpdatePreferences', ({theme}) => {
    if (theme && theme === 'Dark') {
        document.querySelector('html').classList.remove('mode-light')
        document.querySelector('html').classList.add('mode-dark');
    }
    if (theme && theme === 'Light') {
        document.querySelector('html').classList.remove('mode-dark')
        document.querySelector('html').classList.add('mode-light');
    }
});

