import './bootstrap';

// import Alpine from 'alpinejs'
// import persist from '@alpinejs/persist'
// window.Alpine = Alpine
// Alpine.plugin(persist)
// Alpine.start()

window.themeSwitcher = function () {
	var r = document.querySelector(':root');
	var rs = getComputedStyle(r)
	return {
		switchOn: JSON.parse(localStorage.getItem('isDark')) || false,
		switchTheme() {
			if (this.switchOn) {
				document.documentElement.classList.add('dark');
			} else {
				document.documentElement.classList.remove('dark');
			}
			localStorage.setItem('isDark', this.switchOn);

			// Update the theme switcher value in all open tabs
			localStorage.setItem('isDarkGlobal', this.switchOn);

			if (localStorage.getItem('isDarkGlobal') === 'true') {
				r.style.setProperty('--svgcolor', 'white');
			} else if (localStorage.getItem('isDarkGlobal') === 'false') {
				r.style.setProperty('--svgcolor', 'black');
			} else {
				null;
			}
		}
	}
}
