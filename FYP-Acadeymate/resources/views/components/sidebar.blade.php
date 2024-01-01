<div class="overflow-hidden hover:transition-transform transition-all duration-300 ease-in-out"
		x-data="{ hidden: true }"
		x-init="hidden = true">
	<div
		class="inline-flex flex-col justify-center pt-6 pl-6 pr-6 mt-6 ml-6 gap-y-96 align-items-start fixed bg-white dark:bg-gray-800 overflow-auto hover:transition-transform hover:w-72 transition-all duration-300 ease-in-out"
		style="border-radius: 1.5625rem; box-shadow: 2px 0px 4px 1px rgba(0, 0, 0, 0.25);"
		@mouseenter="hidden = false"
		@mouseleave="hidden = true">
		<div class="inline-flex flex-col gap-7">
			<x-nav-link class="flex-row svgIconsHover" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
				<div class="flex justify-content-center align-items-center">
					<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
						d="M13.8952 2.77674C15.1088 1.74515 16.8912 1.74516 18.1049 2.77674L27.8549 11.0642C28.5813 11.6817 29 12.5871 29 13.5405V26.5C29 27.8807 27.8807 29 26.5 29H22.5C21.1193 29 20 27.8807 20 26.5V20C20 18.8984 19.1093 18.0048 18.0088 18H13.9912C12.8907 18.0048 12 18.8984 12 20V26.5C12 27.8807 10.8807 29 9.5 29H5.5C4.11929 29 3 27.8807 3 26.5V13.5405C3 12.5871 3.41868 11.6817 4.14515 11.0642L13.8952 2.77674Z"
						fill="var(--svgcolor)" />
					</svg>
					<span x-show="!hidden" class="flex text-xl pl-10">Dashboard</span>
				</div>
			</x-nav-link>
			<x-nav-link class="flex-row" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
				<div class="flex justify-content-center align-items-center">
					<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
						d="M25.1428 6.57144V23.4286C25.1428 23.7442 25.3986 24 25.7142 24C25.9947 24 26.2281 23.7979 26.2764 23.5313L26.2856 23.4286V8.00001H27.7142C28.7636 8.00001 29.6242 8.80814 29.7076 9.83598L29.7142 10V23.7143C29.7142 25.6949 28.164 27.3134 26.2107 27.4227L25.9999 27.4286H5.99993C4.01932 27.4286 2.40079 25.8784 2.29152 23.9251L2.28564 23.7143V6.57144C2.28564 5.5221 3.09377 4.66151 4.12161 4.57807L4.28564 4.57144H23.1428C24.1921 4.57144 25.0527 5.37957 25.1362 6.40741L25.1428 6.57144V23.4286V6.57144ZM11.1388 14.8611H8.28565C7.2363 14.8611 6.37571 15.6693 6.29227 16.6971L6.28564 16.8611V19.7143C6.28564 20.7636 7.09377 21.6242 8.12161 21.7077L8.28565 21.7143H11.1388C12.1882 21.7143 13.0488 20.9062 13.1322 19.8783L13.1388 19.7143V16.8611C13.1388 15.8118 12.3307 14.9512 11.3029 14.8678L11.1388 14.8611ZM20.2856 20H16.2856L16.1693 20.0078C15.751 20.0646 15.4285 20.4232 15.4285 20.8572C15.4285 21.2911 15.751 21.6497 16.1693 21.7065L16.2856 21.7143H20.2856L20.402 21.7065C20.8203 21.6497 21.1428 21.2911 21.1428 20.8572C21.1428 20.4232 20.8203 20.0646 20.402 20.0078L20.2856 20ZM8.28565 16.5754H11.1388C11.2741 16.5754 11.3874 16.6694 11.417 16.7956L11.4245 16.8611V19.7143C11.4245 19.8496 11.3306 19.9629 11.2043 19.9925L11.1388 20H8.28565C8.15039 20 8.03709 19.906 8.00748 19.7798L7.99993 19.7143V16.8611C7.99993 16.7259 8.09391 16.6126 8.22013 16.583L8.28565 16.5754H11.1388H8.28565ZM20.2856 14.8611H16.2856L16.1693 14.8689C15.751 14.9257 15.4285 15.2843 15.4285 15.7183C15.4285 16.1522 15.751 16.5108 16.1693 16.5676L16.2856 16.5754H20.2856L20.402 16.5676C20.8203 16.5108 21.1428 16.1522 21.1428 15.7183C21.1428 15.2843 20.8203 14.9257 20.402 14.8689L20.2856 14.8611ZM20.2856 9.71048H7.14279L7.02648 9.7183C6.60811 9.77506 6.28564 10.1337 6.28564 10.5676C6.28564 11.0016 6.60811 11.3602 7.02648 11.4169L7.14279 11.4248H20.2856L20.402 11.4169C20.8203 11.3602 21.1428 11.0016 21.1428 10.5676C21.1428 10.1337 20.8203 9.77506 20.402 9.7183L20.2856 9.71048Z"
						fill="var(--svgcolor)" />
					</svg>
					<span x-show="!hidden" class="flex text-xl pl-10">Not Set</span>
				</div>
			</x-nav-link>
			<x-nav-link class="flex-row" href="{{ route('user-actions') }}" :active="request()->routeIs('user-actions')">
				<div class="flex justify-content-center align-items-center">
					<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
						d="M10 11C12.2091 11 14 9.20914 14 7C14 4.79086 12.2091 3 10 3C7.79086 3 6 4.79086 6 7C6 9.20914 7.79086 11 10 11ZM2 15.5C2 14.1193 3.11929 13 4.5 13H10.8749C10.6329 13.6199 10.5 14.2944 10.5 15C10.5 16.8602 11.4234 18.5046 12.8369 19.5H10.5C8.95844 19.5 7.62056 20.372 6.95274 21.6497C5.03741 21.1574 3.81096 20.1981 3.05409 19.1101C1.99999 17.5949 2 16.0256 2 15.7508V15.5ZM25.0473 21.6497C26.9626 21.1574 28.189 20.1981 28.9459 19.1101C30 17.5949 30 16.0248 30 15.75V15.5C30 14.1193 28.8807 13 27.5 13H21.1251C21.3671 13.6199 21.5 14.2944 21.5 15C21.5 16.8602 20.5766 18.5046 19.1631 19.5H21.5C23.0416 19.5 24.3794 20.372 25.0473 21.6497ZM26 7C26 9.20914 24.2091 11 22 11C19.7909 11 18 9.20914 18 7C18 4.79086 19.7909 3 22 3C24.2091 3 26 4.79086 26 7ZM8 23.5C8 22.1193 9.11929 21 10.5 21H21.5C22.8807 21 24 22.1193 24 23.5V23.75C24 24.0248 24 25.5949 22.9459 27.1101C21.8462 28.691 19.7551 30 16 30C12.2449 30 10.1538 28.691 9.05409 27.1101C7.99999 25.5949 8 24.0256 8 23.7508V23.5ZM16 19C18.2091 19 20 17.2091 20 15C20 12.7909 18.2091 11 16 11C13.7909 11 12 12.7909 12 15C12 17.2091 13.7909 19 16 19Z"
						fill="var(--svgcolor)" />
					</svg>
					<span x-show="!hidden" class="flex text-xl pl-10">Not Set</span>
				</div>
			</x-nav-link>
			<x-nav-link class="flex-row">
				<div class="flex justify-content-center align-items-center">
					<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
						d="M28.8319 18.4719C29.0803 18.6528 29.2651 18.9076 29.3599 19.2C29.4578 19.4935 29.4609 19.8105 29.3689 20.1059C28.735 22.1325 27.6568 23.9921 26.2129 25.549C26.0044 25.7725 25.7318 25.9259 25.4325 25.988C25.1333 26.0501 24.8221 26.018 24.5419 25.8959L22.5869 25.0379C22.3736 24.943 22.1411 24.8992 21.9079 24.9099C21.6751 24.9235 21.4489 24.992 21.2479 25.1099C21.0463 25.2264 20.8752 25.389 20.7487 25.5844C20.6221 25.7797 20.5437 26.0024 20.5199 26.2339L20.2849 28.364C20.2509 28.667 20.1243 28.9522 19.9222 29.1805C19.7202 29.4089 19.4525 29.5694 19.1559 29.64C17.0793 30.1353 14.9154 30.1353 12.8389 29.64C12.5437 29.5702 12.2774 29.4105 12.0769 29.183C11.8755 28.9555 11.7488 28.6717 11.7139 28.3699L11.4789 26.2439C11.4381 25.882 11.2654 25.5477 10.9939 25.3049C10.7816 25.1176 10.5208 24.9942 10.2413 24.9489C9.96193 24.9036 9.6754 24.9383 9.41487 25.049L7.45887 25.9079C7.17944 26.0299 6.86911 26.0624 6.57046 26.001C6.27182 25.9396 5.9995 25.7873 5.79087 25.5649C4.34463 24.0064 3.26497 22.1444 2.63087 20.1149C2.53998 19.8214 2.54243 19.507 2.63787 19.2149C2.73266 18.9213 2.9178 18.6651 3.16687 18.4829L4.89187 17.2079C5.08036 17.0697 5.23363 16.8891 5.33929 16.6806C5.44495 16.4721 5.50001 16.2417 5.50001 16.0079C5.50001 15.7742 5.44495 15.5438 5.33929 15.3353C5.23363 15.1268 5.08036 14.9462 4.89187 14.808L3.16687 13.5349C2.92005 13.3551 2.73603 13.1022 2.64087 12.812C2.54411 12.5203 2.54062 12.2057 2.63087 11.9119C3.26477 9.88411 4.3441 8.02374 5.78987 6.46695C5.92957 6.31561 6.10006 6.19591 6.28987 6.11594C6.47508 6.03741 6.67419 5.99695 6.87536 5.99695C7.07653 5.99695 7.27566 6.03741 7.46087 6.11594L9.40687 6.97394C9.62107 7.06594 9.85384 7.10653 10.0865 7.09241C10.3192 7.07829 10.5454 7.00987 10.7469 6.89264C10.9484 6.77541 11.1196 6.61263 11.2469 6.41733C11.3742 6.22202 11.454 5.99962 11.4799 5.76794L11.7159 3.64594C11.748 3.33938 11.8765 3.0509 12.0829 2.82193C12.2892 2.5919 12.5622 2.43212 12.8639 2.36493C13.8974 2.13691 14.9516 2.01561 16.0099 2.00293C17.0619 2.015 18.1099 2.13631 19.1369 2.36493C19.4384 2.43203 19.7112 2.59204 19.917 2.82239C20.1228 3.05273 20.2511 3.3418 20.2839 3.64893L20.5199 5.76895C20.5449 6.00028 20.624 6.22247 20.7508 6.41757C20.8775 6.61267 21.0485 6.77521 21.2497 6.89203C21.4509 7.00885 21.6768 7.07666 21.9091 7.09003C22.1414 7.10339 22.3736 7.06191 22.5869 6.96893L24.5329 6.11194C24.8135 5.98983 25.125 5.95755 25.4247 6.0195C25.7244 6.08145 25.9977 6.23459 26.2069 6.45795C27.6519 8.01339 28.7306 9.87246 29.3639 11.8989C29.4554 12.1927 29.4529 12.5078 29.3566 12.8C29.2603 13.0923 29.0751 13.3471 28.8269 13.5289L27.1069 14.8009C26.9164 14.9386 26.7615 15.1196 26.6549 15.3289C26.4958 15.6427 26.4536 16.0028 26.5356 16.3448C26.6177 16.6868 26.8188 16.9885 27.1029 17.196L28.8319 18.4719ZM16 20C18.2091 20 20 18.2091 20 16C20 13.7909 18.2091 12 16 12C13.7909 12 12 13.7909 12 16C12 18.2091 13.7909 20 16 20Z"
						fill="var(--svgcolor)" />
					</svg>
					<span x-show="!hidden" class="flex text-xl pl-10">Settings</span>
				</div>
			</x-nav-link>
		</div>

		<div class="inline-flex flex-col gap-7 pb-6 justify-bottom">
			<form method="POST" action="{{ route('logout') }}" x-data>
				@csrf
					<x-nav-link class="flex-row"  href="{{ route('logout') }}" @click.prevent="$root.submit();">
						<div class="flex justify-content-center align-items-center">
							<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path
								d="M15.9998 5.80558V14L16.0006 14.6733L25.9225 14.672L23.6259 12.3737C23.271 12.0186 23.2388 11.463 23.5293 11.0716L23.6262 10.9595C23.9813 10.6045 24.5368 10.5723 24.9283 10.8629L25.0404 10.9597L29.0359 14.9566C29.3905 15.3113 29.423 15.8663 29.1332 16.2577L29.0366 16.3699L25.0411 20.3745C24.651 20.7654 24.0178 20.7661 23.6269 20.3761C23.2714 20.0214 23.2385 19.4659 23.5286 19.0741L23.6253 18.9618L25.9092 16.672L16.0006 16.6733L15.9998 25.6667C15.9998 26.2886 15.4383 26.7596 14.8259 26.6515L3.49257 24.6497C3.01478 24.5653 2.6665 24.1502 2.6665 23.665V7.6667C2.6665 7.17695 3.02119 6.75927 3.50446 6.67991L14.8378 4.8188C15.4466 4.71882 15.9998 5.18861 15.9998 5.80558ZM11.336 15.3334C10.5981 15.3334 9.99984 15.9316 9.99984 16.6696C9.99984 17.4075 10.5981 18.0058 11.336 18.0058C12.074 18.0058 12.6722 17.4075 12.6722 16.6696C12.6722 15.9316 12.074 15.3334 11.336 15.3334ZM17.3332 24.6684L18.3534 24.6686L18.4892 24.6595C18.9779 24.5931 19.3542 24.1738 19.3534 23.667L19.3438 18H17.3332V24.6684ZM17.3358 13.3334L17.3332 11.6338V6.66669L18.3269 6.6667C18.8325 6.6667 19.2506 7.04205 19.3175 7.52951L19.3269 7.66504L19.3358 13.3334H17.3358Z" fill="var(--svgcolor)" />
							</svg>
							<span x-show="!hidden" class="flex text-xl pl-10">Logout</span>
						</div>
					</x-nav-link>
			</form>
		</div>
	</div>
</div>
