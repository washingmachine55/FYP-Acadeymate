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
				r.style.setProperty('--svgcolor', 'rgb(255, 255, 255)');
				// r.style.setProperty('--underline-color', 'rgb(255, 255, 255, 0.7)');
				r.style.setProperty('--underline-color', 'rgba(255, 255, 255, var(--alpha-underline-dark))');
			} else if (localStorage.getItem('isDarkGlobal') === 'false') {
				r.style.setProperty('--svgcolor', 'rgb(0, 0, 0)');
				// r.style.setProperty('--underline-color', 'rgb(0, 0, 0, 0.7)');
				r.style.setProperty('--underline-color', 'rgba(0, 0, 0,  var(--alpha-underline-light))');
			} else {
				null;
			}
		}
	}
}

window.Alpine.store('table', {
    editing: false,
    toggleEditing() {
        this.editing = !this.editing;
    },
    disableEditing() {
        this.editing = false;
    }
});

window.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        Alpine.store('table').disableEditing();
    }
});
