{{-- <div class="overflow-hidden hover:transition-transform transition-all duration-300 ease-in-out" --}}
<div class=" "
		x-data="{ hidden: true }"
		x-init="hidden = true"
		id="sidenav">
	<div
		class="container-side-nav pt-6 pl-4 pr-4 inline-flex flex-col align-items-start fixed bg-orange-100 dark:bg-gray-800 flex-nowrap text-nowrap "
		{{-- overflow-auto hover:transition-transform hover:w-72 transition-all duration-300 ease-in-out --}}
		style="border-radius: 1.5625rem; box-shadow: 2px 0px 4px 1px rgba(0, 0, 0, 0.25);"
		id="sidenav-child"

		@mouseenter="hidden = false"
		@mouseleave="hidden = true"
		x-transition.delay.500ms
		>
		<div class="inline-flex flex-col relative gap-3 mb-auto test-animation" >
			<x-sidenav-link class="flex-row svgIconsHover" wire:navigate href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
			<div class="flex justify-content-center align-items-center">
						<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
							d="M13.8952 2.77674C15.1088 1.74515 16.8912 1.74516 18.1049 2.77674L27.8549 11.0642C28.5813 11.6817 29 12.5871 29 13.5405V26.5C29 27.8807 27.8807 29 26.5 29H22.5C21.1193 29 20 27.8807 20 26.5V20C20 18.8984 19.1093 18.0048 18.0088 18H13.9912C12.8907 18.0048 12 18.8984 12 20V26.5C12 27.8807 10.8807 29 9.5 29H5.5C4.11929 29 3 27.8807 3 26.5V13.5405C3 12.5871 3.41868 11.6817 4.14515 11.0642L13.8952 2.77674Z"
							fill="var(--svgcolor)" />
						</svg>
						<span
						x-show="!hidden"
						x-transition:enter="transition duration-1000 ease"
						x-transition:enter-start="opacity-0"
						x-transition:enter-end="opacity-100"
						x-transition:leave="transition duration-150 ease-out"
						x-transition:leave-start="opacity-100"
						x-transition:leave-end="opacity-0"
						class="flex text-xl pl-6 sidebar-span">Dashboard</span>
					</div>
			</x-sidenav-link>
			<x-sidenav-link class="flex-row svgIconsHover" wire:navigate href="{{ route('component-test-dashboard') }}" :active="request()->routeIs('component-test-dashboard')">
				<div class="flex justify-content-center align-items-center">
					<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
						d="M25.1428 6.57144V23.4286C25.1428 23.7442 25.3986 24 25.7142 24C25.9947 24 26.2281 23.7979 26.2764 23.5313L26.2856 23.4286V8.00001H27.7142C28.7636 8.00001 29.6242 8.80814 29.7076 9.83598L29.7142 10V23.7143C29.7142 25.6949 28.164 27.3134 26.2107 27.4227L25.9999 27.4286H5.99993C4.01932 27.4286 2.40079 25.8784 2.29152 23.9251L2.28564 23.7143V6.57144C2.28564 5.5221 3.09377 4.66151 4.12161 4.57807L4.28564 4.57144H23.1428C24.1921 4.57144 25.0527 5.37957 25.1362 6.40741L25.1428 6.57144V23.4286V6.57144ZM11.1388 14.8611H8.28565C7.2363 14.8611 6.37571 15.6693 6.29227 16.6971L6.28564 16.8611V19.7143C6.28564 20.7636 7.09377 21.6242 8.12161 21.7077L8.28565 21.7143H11.1388C12.1882 21.7143 13.0488 20.9062 13.1322 19.8783L13.1388 19.7143V16.8611C13.1388 15.8118 12.3307 14.9512 11.3029 14.8678L11.1388 14.8611ZM20.2856 20H16.2856L16.1693 20.0078C15.751 20.0646 15.4285 20.4232 15.4285 20.8572C15.4285 21.2911 15.751 21.6497 16.1693 21.7065L16.2856 21.7143H20.2856L20.402 21.7065C20.8203 21.6497 21.1428 21.2911 21.1428 20.8572C21.1428 20.4232 20.8203 20.0646 20.402 20.0078L20.2856 20ZM8.28565 16.5754H11.1388C11.2741 16.5754 11.3874 16.6694 11.417 16.7956L11.4245 16.8611V19.7143C11.4245 19.8496 11.3306 19.9629 11.2043 19.9925L11.1388 20H8.28565C8.15039 20 8.03709 19.906 8.00748 19.7798L7.99993 19.7143V16.8611C7.99993 16.7259 8.09391 16.6126 8.22013 16.583L8.28565 16.5754H11.1388H8.28565ZM20.2856 14.8611H16.2856L16.1693 14.8689C15.751 14.9257 15.4285 15.2843 15.4285 15.7183C15.4285 16.1522 15.751 16.5108 16.1693 16.5676L16.2856 16.5754H20.2856L20.402 16.5676C20.8203 16.5108 21.1428 16.1522 21.1428 15.7183C21.1428 15.2843 20.8203 14.9257 20.402 14.8689L20.2856 14.8611ZM20.2856 9.71048H7.14279L7.02648 9.7183C6.60811 9.77506 6.28564 10.1337 6.28564 10.5676C6.28564 11.0016 6.60811 11.3602 7.02648 11.4169L7.14279 11.4248H20.2856L20.402 11.4169C20.8203 11.3602 21.1428 11.0016 21.1428 10.5676C21.1428 10.1337 20.8203 9.77506 20.402 9.7183L20.2856 9.71048Z"
						fill="var(--svgcolor)" />
					</svg>
					<span
					x-show="!hidden"
					x-transition:enter="transition duration-1000 ease"
					x-transition:enter-start="opacity-0"
					x-transition:enter-end="opacity-100"
					x-transition:leave="transition duration-150 ease-out"
					x-transition:leave-start="opacity-100"
					x-transition:leave-end="opacity-0"
					class="flex text-xl pl-6 sidebar-span">Not Set</span>
				</div>
			</x-sidenav-link>
			<x-sidenav-link class="flex-row" href="{{ route('user-actions') }}" :active="request()->routeIs('user-actions')">
				<div class="flex justify-content-center align-items-center">
					<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
						d="M10 11C12.2091 11 14 9.20914 14 7C14 4.79086 12.2091 3 10 3C7.79086 3 6 4.79086 6 7C6 9.20914 7.79086 11 10 11ZM2 15.5C2 14.1193 3.11929 13 4.5 13H10.8749C10.6329 13.6199 10.5 14.2944 10.5 15C10.5 16.8602 11.4234 18.5046 12.8369 19.5H10.5C8.95844 19.5 7.62056 20.372 6.95274 21.6497C5.03741 21.1574 3.81096 20.1981 3.05409 19.1101C1.99999 17.5949 2 16.0256 2 15.7508V15.5ZM25.0473 21.6497C26.9626 21.1574 28.189 20.1981 28.9459 19.1101C30 17.5949 30 16.0248 30 15.75V15.5C30 14.1193 28.8807 13 27.5 13H21.1251C21.3671 13.6199 21.5 14.2944 21.5 15C21.5 16.8602 20.5766 18.5046 19.1631 19.5H21.5C23.0416 19.5 24.3794 20.372 25.0473 21.6497ZM26 7C26 9.20914 24.2091 11 22 11C19.7909 11 18 9.20914 18 7C18 4.79086 19.7909 3 22 3C24.2091 3 26 4.79086 26 7ZM8 23.5C8 22.1193 9.11929 21 10.5 21H21.5C22.8807 21 24 22.1193 24 23.5V23.75C24 24.0248 24 25.5949 22.9459 27.1101C21.8462 28.691 19.7551 30 16 30C12.2449 30 10.1538 28.691 9.05409 27.1101C7.99999 25.5949 8 24.0256 8 23.7508V23.5ZM16 19C18.2091 19 20 17.2091 20 15C20 12.7909 18.2091 11 16 11C13.7909 11 12 12.7909 12 15C12 17.2091 13.7909 19 16 19Z"
						fill="var(--svgcolor)" />
					</svg>
					<span
					x-show="!hidden"
					x-transition:enter="transition duration-1000 ease"
					x-transition:enter-start="opacity-0"
					x-transition:enter-end="opacity-100"
					x-transition:leave="transition duration-150 ease-out"
					x-transition:leave-start="opacity-100"
					x-transition:leave-end="opacity-0"
					class="flex text-xl pl-6 sidebar-span">Not Set</span>
				</div>
			</x-sidenav-link>
			<x-sidenav-link class="flex-row" href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
				<div class="flex justify-content-center align-items-center">
					<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
						d="M28.8319 18.4719C29.0803 18.6528 29.2651 18.9076 29.3599 19.2C29.4578 19.4935 29.4609 19.8105 29.3689 20.1059C28.735 22.1325 27.6568 23.9921 26.2129 25.549C26.0044 25.7725 25.7318 25.9259 25.4325 25.988C25.1333 26.0501 24.8221 26.018 24.5419 25.8959L22.5869 25.0379C22.3736 24.943 22.1411 24.8992 21.9079 24.9099C21.6751 24.9235 21.4489 24.992 21.2479 25.1099C21.0463 25.2264 20.8752 25.389 20.7487 25.5844C20.6221 25.7797 20.5437 26.0024 20.5199 26.2339L20.2849 28.364C20.2509 28.667 20.1243 28.9522 19.9222 29.1805C19.7202 29.4089 19.4525 29.5694 19.1559 29.64C17.0793 30.1353 14.9154 30.1353 12.8389 29.64C12.5437 29.5702 12.2774 29.4105 12.0769 29.183C11.8755 28.9555 11.7488 28.6717 11.7139 28.3699L11.4789 26.2439C11.4381 25.882 11.2654 25.5477 10.9939 25.3049C10.7816 25.1176 10.5208 24.9942 10.2413 24.9489C9.96193 24.9036 9.6754 24.9383 9.41487 25.049L7.45887 25.9079C7.17944 26.0299 6.86911 26.0624 6.57046 26.001C6.27182 25.9396 5.9995 25.7873 5.79087 25.5649C4.34463 24.0064 3.26497 22.1444 2.63087 20.1149C2.53998 19.8214 2.54243 19.507 2.63787 19.2149C2.73266 18.9213 2.9178 18.6651 3.16687 18.4829L4.89187 17.2079C5.08036 17.0697 5.23363 16.8891 5.33929 16.6806C5.44495 16.4721 5.50001 16.2417 5.50001 16.0079C5.50001 15.7742 5.44495 15.5438 5.33929 15.3353C5.23363 15.1268 5.08036 14.9462 4.89187 14.808L3.16687 13.5349C2.92005 13.3551 2.73603 13.1022 2.64087 12.812C2.54411 12.5203 2.54062 12.2057 2.63087 11.9119C3.26477 9.88411 4.3441 8.02374 5.78987 6.46695C5.92957 6.31561 6.10006 6.19591 6.28987 6.11594C6.47508 6.03741 6.67419 5.99695 6.87536 5.99695C7.07653 5.99695 7.27566 6.03741 7.46087 6.11594L9.40687 6.97394C9.62107 7.06594 9.85384 7.10653 10.0865 7.09241C10.3192 7.07829 10.5454 7.00987 10.7469 6.89264C10.9484 6.77541 11.1196 6.61263 11.2469 6.41733C11.3742 6.22202 11.454 5.99962 11.4799 5.76794L11.7159 3.64594C11.748 3.33938 11.8765 3.0509 12.0829 2.82193C12.2892 2.5919 12.5622 2.43212 12.8639 2.36493C13.8974 2.13691 14.9516 2.01561 16.0099 2.00293C17.0619 2.015 18.1099 2.13631 19.1369 2.36493C19.4384 2.43203 19.7112 2.59204 19.917 2.82239C20.1228 3.05273 20.2511 3.3418 20.2839 3.64893L20.5199 5.76895C20.5449 6.00028 20.624 6.22247 20.7508 6.41757C20.8775 6.61267 21.0485 6.77521 21.2497 6.89203C21.4509 7.00885 21.6768 7.07666 21.9091 7.09003C22.1414 7.10339 22.3736 7.06191 22.5869 6.96893L24.5329 6.11194C24.8135 5.98983 25.125 5.95755 25.4247 6.0195C25.7244 6.08145 25.9977 6.23459 26.2069 6.45795C27.6519 8.01339 28.7306 9.87246 29.3639 11.8989C29.4554 12.1927 29.4529 12.5078 29.3566 12.8C29.2603 13.0923 29.0751 13.3471 28.8269 13.5289L27.1069 14.8009C26.9164 14.9386 26.7615 15.1196 26.6549 15.3289C26.4958 15.6427 26.4536 16.0028 26.5356 16.3448C26.6177 16.6868 26.8188 16.9885 27.1029 17.196L28.8319 18.4719ZM16 20C18.2091 20 20 18.2091 20 16C20 13.7909 18.2091 12 16 12C13.7909 12 12 13.7909 12 16C12 18.2091 13.7909 20 16 20Z"
						fill="var(--svgcolor)" />
					</svg>
					<span
					x-show="!hidden"
					x-transition:enter="transition duration-1000 ease"
					x-transition:enter-start="opacity-0"
					x-transition:enter-end="opacity-100"
					x-transition:leave="transition duration-150 ease-out"
					x-transition:leave-start="opacity-100"
					x-transition:leave-end="opacity-0"
					class="flex text-xl pl-6 sidebar-span">Profile Settings</span>
				</div>
			</x-sidenav-link>
			<x-sidenav-link class="flex-row" href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
				<div class="flex justify-content-center align-items-center">
					<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M29.9922 7C29.9922 4.23858 27.7542 2 24.9936 2H6.99861C4.23795 2 2 4.23858 2 7V25C2 27.7614 4.23795 30 6.99861 30H12.1679H16.0049H25.0024C29.0013 30 30 25 30 25L29.9922 19V13.5153V7ZM9.99777 8.99975V22.9998C9.99777 23.552 9.55018 23.9998 8.99805 23.9998C8.44592 23.9998 7.99833 23.552 7.99833 22.9998V8.99976C7.99833 8.44747 8.44592 7.99976 8.99805 7.99976C9.55018 7.99976 9.99777 8.44747 9.99777 8.99975Z"
						fill="var(--svgcolor)" />
					</svg>
					<span
					x-show="!hidden"
					x-transition:enter="transition duration-1000 ease"
					x-transition:enter-start="opacity-0"
					x-transition:enter-end="opacity-100"
					x-transition:leave="transition duration-150 ease-out"
					x-transition:leave-start="opacity-100"
					x-transition:leave-end="opacity-0"
					class="flex text-xl pl-6 sidebar-span">Profile Settings</span>
				</div>
			</x-sidenav-link>
			<x-sidenav-link class="flex-row" href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
				<div class="flex justify-content-center align-items-center">
					<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M3.86667 6.6667C3.86667 4.08935 5.956 2 8.53333 2H25.3333C27.9107 2 30 4.08935 30 6.6667V23.4668C30 26.0442 27.9107 28.1335 25.3333 28.1335H20.5073C20.3725 27.7513 20.1523 27.3925 19.8466 27.0867L16.1143 23.3545C16.6392 22.2573 16.9333 21.0283 16.9333 19.7332C16.9333 15.094 13.1725 11.3332 8.53333 11.3332C6.80653 11.3332 5.20142 11.8542 3.86667 12.7477V6.6667ZM22.5333 8.53316V21.5999C22.5333 22.1154 22.9512 22.5333 23.4667 22.5333C23.9821 22.5333 24.4 22.1154 24.4 21.5999V8.53316C24.4 8.01769 23.9821 7.59982 23.4667 7.59982C22.9512 7.59982 22.5333 8.01769 22.5333 8.53316ZM15.0667 19.7332C15.0667 21.2008 14.5828 22.5553 13.766 23.646L18.5266 28.4067C18.8911 28.7712 18.8911 29.3621 18.5266 29.7266C18.1621 30.0911 17.5712 30.0911 17.2067 29.7266L12.446 24.9659C11.3554 25.7828 10.0008 26.2666 8.53333 26.2666C4.92507 26.2666 2 23.3415 2 19.7332C2 16.125 4.92507 13.1999 8.53333 13.1999C12.1416 13.1999 15.0667 16.125 15.0667 19.7332ZM13.2 19.7332C13.2 17.1559 11.1107 15.0665 8.53333 15.0665C5.956 15.0665 3.86667 17.1559 3.86667 19.7332C3.86667 22.3106 5.956 24.4 8.53333 24.4C11.1107 24.4 13.2 22.3106 13.2 19.7332Z"
						fill="var(--svgcolor)" />
					</svg>
					<span
					x-show="!hidden"
					x-transition:enter="transition duration-1000 ease"
					x-transition:enter-start="opacity-0"
					x-transition:enter-end="opacity-100"
					x-transition:leave="transition duration-150 ease-out"
					x-transition:leave-start="opacity-100"
					x-transition:leave-end="opacity-0"
					class="flex text-xl pl-6 sidebar-span">Profile Settings</span>
				</div>
			</x-sidenav-link>
			<x-sidenav-link class="flex-row" href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
				<div class="flex justify-content-center align-items-center">
					<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M13.3332 6.66667H18.6665C18.6665 5.19391 17.4726 4 15.9998 4C14.5271 4 13.3332 5.19391 13.3332 6.66667ZM11.3332 6.66667C11.3332 4.08934 13.4225 2 15.9998 2C18.5772 2 20.6665 4.08934 20.6665 6.66667H28.3332C28.8855 6.66667 29.3332 7.11438 29.3332 7.66667C29.3332 8.21895 28.8855 8.66667 28.3332 8.66667H26.5744L25.0117 24.815C24.7636 27.3779 22.6098 29.3333 20.0349 29.3333H11.9648C9.38989 29.3333 7.23603 27.3779 6.98801 24.815L5.42527 8.66667H3.6665C3.11422 8.66667 2.6665 8.21895 2.6665 7.66667C2.6665 7.11438 3.11422 6.66667 3.6665 6.66667H11.3332ZM13.9998 13C13.9998 12.4477 13.5521 12 12.9998 12C12.4476 12 11.9998 12.4477 11.9998 13V23C11.9998 23.5523 12.4476 24 12.9998 24C13.5521 24 13.9998 23.5523 13.9998 23V13ZM18.9998 12C18.4476 12 17.9998 12.4477 17.9998 13V23C17.9998 23.5523 18.4476 24 18.9998 24C19.5521 24 19.9998 23.5523 19.9998 23V13C19.9998 12.4477 19.5521 12 18.9998 12Z"
						fill="var(--svgcolor)" />
					</svg>
					<span
					x-show="!hidden"
					x-transition:enter="transition duration-1000 ease"
					x-transition:enter-start="opacity-0"
					x-transition:enter-end="opacity-100"
					x-transition:leave="transition duration-150 ease-out"
					x-transition:leave-start="opacity-100"
					x-transition:leave-end="opacity-0"
					class="flex text-xl pl-6 sidebar-span">Profile Settings</span>
				</div>
			</x-sidenav-link>
			<x-sidenav-link class="flex-row" href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
				<div class="flex justify-content-center align-items-center">
					<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M3.49984 10.3334H16.7499C17.1359 12.2352 18.8174 13.6667 20.8332 13.6667C22.849 13.6667 24.5304 12.2352 24.9165 10.3334H28.4998C28.9601 10.3334 29.3332 9.96028 29.3332 9.50004C29.3332 9.0398 28.9601 8.66671 28.4998 8.66671H24.9165C24.5304 6.76484 22.849 5.33337 20.8332 5.33337C18.8174 5.33337 17.1359 6.76484 16.7499 8.66671H3.49984C3.0396 8.66671 2.6665 9.0398 2.6665 9.50004C2.6665 9.96028 3.0396 10.3334 3.49984 10.3334ZM3.49984 23H7.24985C7.63591 24.9019 9.31737 26.3334 11.3332 26.3334C13.349 26.3334 15.0304 24.9019 15.4165 23H28.4998C28.9601 23 29.3332 22.6269 29.3332 22.1667C29.3332 21.7065 28.9601 21.3334 28.4998 21.3334H15.4165C15.0304 19.4315 13.349 18 11.3332 18C9.31737 18 7.63591 19.4315 7.24985 21.3334H3.49984C3.0396 21.3334 2.6665 21.7065 2.6665 22.1667C2.6665 22.6269 3.0396 23 3.49984 23Z"
						fill="var(--svgcolor)" />
					</svg>
					<span
					x-show="!hidden"
					x-transition:enter="transition duration-1000 ease"
					x-transition:enter-start="opacity-0"
					x-transition:enter-end="opacity-100"
					x-transition:leave="transition duration-150 ease-out"
					x-transition:leave-start="opacity-100"
					x-transition:leave-end="opacity-0"
					class="flex text-xl pl-6 sidebar-span">Profile Settings</span>
				</div>
			</x-sidenav-link>
			<x-sidenav-link class="flex-row" href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
				<div class="flex justify-content-center align-items-center">
					<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.75 5.5C6.50736 5.5 5.5 6.50736 5.5 7.75V24.25C5.5 25.4926 6.50736 26.5 7.75 26.5H24.25C25.4926 26.5 26.5 25.4926 26.5 24.25V19.25C26.5 18.5596 27.0596 18 27.75 18C28.4404 18 29 18.5596 29 19.25V24.25C29 26.8734 26.8734 29 24.25 29H7.75C5.12665 29 3 26.8734 3 24.25V7.75C3 5.12665 5.12665 3 7.75 3H12.75C13.4404 3 14 3.55964 14 4.25C14 4.94036 13.4404 5.5 12.75 5.5H7.75ZM18 4.25C18 3.55964 18.5596 3 19.25 3H27.75C28.4404 3 29 3.55964 29 4.25V12.75C29 13.4404 28.4404 14 27.75 14C27.0596 14 26.5 13.4404 26.5 12.75V7.26798L20.1339 13.6341C19.6457 14.1223 18.8543 14.1223 18.3661 13.6341C17.878 13.1459 17.878 12.3545 18.3661 11.8663L24.7324 5.5H19.25C18.5596 5.5 18 4.94036 18 4.25Z"
						fill="var(--svgcolor)" />
					</svg>
					<span
					x-show="!hidden"
					x-transition:enter="transition duration-1000 ease"
					x-transition:enter-start="opacity-0"
					x-transition:enter-end="opacity-100"
					x-transition:leave="transition duration-150 ease-out"
					x-transition:leave-start="opacity-100"
					x-transition:leave-end="opacity-0"
					class="flex text-xl pl-6 sidebar-span">Profile Settings</span>
				</div>
			</x-sidenav-link>
			<x-sidenav-link class="flex-row" href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
				<div class="flex justify-content-center align-items-center">
					<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M11 7C11 4.23858 13.2386 2 16 2C18.7614 2 21 4.23858 21 7C21 9.4194 19.2816 11.4374 16.9988 11.9002V14.9988H22.2671C23.7766 14.9988 25.0002 16.2225 25.0002 17.732V20.1001C27.2824 20.5634 29 22.5811 29 25C29 27.7614 26.7614 30 24 30C21.2386 30 19 27.7614 19 25C19 22.581 20.7179 20.5631 23.0002 20.1V17.732C23.0002 17.3271 22.672 16.9988 22.2671 16.9988H9.73343C9.3285 16.9988 9.00024 17.3271 9.00024 17.732V20.1001C11.2824 20.5634 13 22.5811 13 25C13 27.7614 10.7614 30 8 30C5.23858 30 3 27.7614 3 25C3 22.581 4.71788 20.5631 7.00024 20.1V17.732C7.00024 16.2225 8.22393 14.9988 9.73343 14.9988H14.9988V11.8997C12.7171 11.436 11 9.41852 11 7Z"
						fill="var(--svgcolor)" />
					</svg>
					<span
					x-show="!hidden"
					x-transition:enter="transition duration-1000 ease"
					x-transition:enter-start="opacity-0"
					x-transition:enter-end="opacity-100"
					x-transition:leave="transition duration-150 ease-out"
					x-transition:leave-start="opacity-100"
					x-transition:leave-end="opacity-0"
					class="flex text-xl pl-6 sidebar-span">Profile Settings</span>
				</div>
			</x-sidenav-link>
		</div>

		<div class="inline-flex flex-col gap-3 pb-6 justify-end">
			<x-sidenav-link class="flex-row" href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
				<div class="flex justify-content-center align-items-center">
					<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
						d="M28.8319 18.4719C29.0803 18.6528 29.2651 18.9076 29.3599 19.2C29.4578 19.4935 29.4609 19.8105 29.3689 20.1059C28.735 22.1325 27.6568 23.9921 26.2129 25.549C26.0044 25.7725 25.7318 25.9259 25.4325 25.988C25.1333 26.0501 24.8221 26.018 24.5419 25.8959L22.5869 25.0379C22.3736 24.943 22.1411 24.8992 21.9079 24.9099C21.6751 24.9235 21.4489 24.992 21.2479 25.1099C21.0463 25.2264 20.8752 25.389 20.7487 25.5844C20.6221 25.7797 20.5437 26.0024 20.5199 26.2339L20.2849 28.364C20.2509 28.667 20.1243 28.9522 19.9222 29.1805C19.7202 29.4089 19.4525 29.5694 19.1559 29.64C17.0793 30.1353 14.9154 30.1353 12.8389 29.64C12.5437 29.5702 12.2774 29.4105 12.0769 29.183C11.8755 28.9555 11.7488 28.6717 11.7139 28.3699L11.4789 26.2439C11.4381 25.882 11.2654 25.5477 10.9939 25.3049C10.7816 25.1176 10.5208 24.9942 10.2413 24.9489C9.96193 24.9036 9.6754 24.9383 9.41487 25.049L7.45887 25.9079C7.17944 26.0299 6.86911 26.0624 6.57046 26.001C6.27182 25.9396 5.9995 25.7873 5.79087 25.5649C4.34463 24.0064 3.26497 22.1444 2.63087 20.1149C2.53998 19.8214 2.54243 19.507 2.63787 19.2149C2.73266 18.9213 2.9178 18.6651 3.16687 18.4829L4.89187 17.2079C5.08036 17.0697 5.23363 16.8891 5.33929 16.6806C5.44495 16.4721 5.50001 16.2417 5.50001 16.0079C5.50001 15.7742 5.44495 15.5438 5.33929 15.3353C5.23363 15.1268 5.08036 14.9462 4.89187 14.808L3.16687 13.5349C2.92005 13.3551 2.73603 13.1022 2.64087 12.812C2.54411 12.5203 2.54062 12.2057 2.63087 11.9119C3.26477 9.88411 4.3441 8.02374 5.78987 6.46695C5.92957 6.31561 6.10006 6.19591 6.28987 6.11594C6.47508 6.03741 6.67419 5.99695 6.87536 5.99695C7.07653 5.99695 7.27566 6.03741 7.46087 6.11594L9.40687 6.97394C9.62107 7.06594 9.85384 7.10653 10.0865 7.09241C10.3192 7.07829 10.5454 7.00987 10.7469 6.89264C10.9484 6.77541 11.1196 6.61263 11.2469 6.41733C11.3742 6.22202 11.454 5.99962 11.4799 5.76794L11.7159 3.64594C11.748 3.33938 11.8765 3.0509 12.0829 2.82193C12.2892 2.5919 12.5622 2.43212 12.8639 2.36493C13.8974 2.13691 14.9516 2.01561 16.0099 2.00293C17.0619 2.015 18.1099 2.13631 19.1369 2.36493C19.4384 2.43203 19.7112 2.59204 19.917 2.82239C20.1228 3.05273 20.2511 3.3418 20.2839 3.64893L20.5199 5.76895C20.5449 6.00028 20.624 6.22247 20.7508 6.41757C20.8775 6.61267 21.0485 6.77521 21.2497 6.89203C21.4509 7.00885 21.6768 7.07666 21.9091 7.09003C22.1414 7.10339 22.3736 7.06191 22.5869 6.96893L24.5329 6.11194C24.8135 5.98983 25.125 5.95755 25.4247 6.0195C25.7244 6.08145 25.9977 6.23459 26.2069 6.45795C27.6519 8.01339 28.7306 9.87246 29.3639 11.8989C29.4554 12.1927 29.4529 12.5078 29.3566 12.8C29.2603 13.0923 29.0751 13.3471 28.8269 13.5289L27.1069 14.8009C26.9164 14.9386 26.7615 15.1196 26.6549 15.3289C26.4958 15.6427 26.4536 16.0028 26.5356 16.3448C26.6177 16.6868 26.8188 16.9885 27.1029 17.196L28.8319 18.4719ZM16 20C18.2091 20 20 18.2091 20 16C20 13.7909 18.2091 12 16 12C13.7909 12 12 13.7909 12 16C12 18.2091 13.7909 20 16 20Z"
						fill="var(--svgcolor)" />
					</svg>
					<span
					x-show="!hidden"
					x-transition:enter="transition duration-1000 ease"
					x-transition:enter-start="opacity-0"
					x-transition:enter-end="opacity-100"
					x-transition:leave="transition duration-150 ease-out"
					x-transition:leave-start="opacity-100"
					x-transition:leave-end="opacity-0"
					class="flex text-xl pl-6 sidebar-span">Profile Settings</span>
				</div>
			</x-sidenav-link>
			<form method="POST" action="{{ route('logout') }}" x-data>
				@csrf
					<x-sidenav-link class="flex-row fill-available"  href="{{ route('logout') }}" @click.prevent="$root.submit();">
						<div class="flex justify-content-center align-items-center pl-1">
							<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path
								d="M15.9998 5.80558V14L16.0006 14.6733L25.9225 14.672L23.6259 12.3737C23.271 12.0186 23.2388 11.463 23.5293 11.0716L23.6262 10.9595C23.9813 10.6045 24.5368 10.5723 24.9283 10.8629L25.0404 10.9597L29.0359 14.9566C29.3905 15.3113 29.423 15.8663 29.1332 16.2577L29.0366 16.3699L25.0411 20.3745C24.651 20.7654 24.0178 20.7661 23.6269 20.3761C23.2714 20.0214 23.2385 19.4659 23.5286 19.0741L23.6253 18.9618L25.9092 16.672L16.0006 16.6733L15.9998 25.6667C15.9998 26.2886 15.4383 26.7596 14.8259 26.6515L3.49257 24.6497C3.01478 24.5653 2.6665 24.1502 2.6665 23.665V7.6667C2.6665 7.17695 3.02119 6.75927 3.50446 6.67991L14.8378 4.8188C15.4466 4.71882 15.9998 5.18861 15.9998 5.80558ZM11.336 15.3334C10.5981 15.3334 9.99984 15.9316 9.99984 16.6696C9.99984 17.4075 10.5981 18.0058 11.336 18.0058C12.074 18.0058 12.6722 17.4075 12.6722 16.6696C12.6722 15.9316 12.074 15.3334 11.336 15.3334ZM17.3332 24.6684L18.3534 24.6686L18.4892 24.6595C18.9779 24.5931 19.3542 24.1738 19.3534 23.667L19.3438 18H17.3332V24.6684ZM17.3358 13.3334L17.3332 11.6338V6.66669L18.3269 6.6667C18.8325 6.6667 19.2506 7.04205 19.3175 7.52951L19.3269 7.66504L19.3358 13.3334H17.3358Z" fill="var(--svgcolor)" />
							</svg>
							<span
							x-show="!hidden"
							x-transition:enter="transition duration-1000 ease"
							x-transition:enter-start="opacity-0"
							x-transition:enter-end="opacity-100"
							x-transition:leave="transition duration-150 ease-out"
							x-transition:leave-start="opacity-100"
							x-transition:leave-end="opacity-0"
							class="flex text-xl pl-5 sidebar-span">Logout</span>
						</div>
					</x-sidenav-link>
			</form>
		</div>
	</div>
</div>

					{{-- <span
					x-show="!hidden"
					x-transition:enter="transition duration-1000 ease"
					x-transition:enter-start="opacity-0"
					x-transition:enter-end="opacity-100 class="flex text-xl pl-6 sidebar-span">Not Set</span> --}}
