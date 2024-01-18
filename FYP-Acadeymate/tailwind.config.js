import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                display: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
        },
		screens: {
			'sm': '320px',
			// => @media (min-width: 640px) { ... }

			'md': '768px',
			// => @media (min-width: 768px) { ... }

			'lg': '1024px',
			// => @media (min-width: 1024px) { ... }

			'xl': '1280px',
			// => @media (min-width: 1280px) { ... }

			'2xl': '1536px',
			// => @media (min-width: 1536px) { ... }

			// ALT STYLING
			// 'sm': {'min': '320px', 'max': '767px'},
			// // => @media (min-width: 640px) { ... }

			// 'md': {'min': '768px', 'max-width': '1023px'},
			// // => @media (min-width: 768px) { ... }

			// 'lg': {'min': '1024px', 'max-width': '1279px'},
			// // => @media (min-width: 1024px) { ... }

			// 'xl': {'min': '1280px', 'max-width': '1535px'},
			// // => @media (min-width: 1280px) { ... }

			// '2xl': {'min': '1536px'},
			// // => @media (min-width: 1536px) { ... }
		},
		transitionProperty: {
			'text-decoration': 'text-decoration',
		},
    },

    plugins: [forms, typography],

	darkMode: 'class',

};
