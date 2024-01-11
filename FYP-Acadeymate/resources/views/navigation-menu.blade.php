<nav x-data="{ open: false }" class="fixed top-0 left-0 z-50 bg-orange-100 border-b-2 dark:bg-gray-800 dark:border-gray-700 mt-3 ml-4 navbar-width transition-all duration-500" style=" box-shadow: 2px 0px 4px 1px rgba(0, 0, 0, 0.25);">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-9xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block w-auto h-9" />
                    </a>
                </div>

				{{-- Search bar looky thingy --}}
				<div name="header" :class="{'block': open, 'hidden': ! open}" class="hidden lg:block sm:hidden">
					<div class="py-5 mx-auto text-center sm:px-6 lg:px-8">
						<x-input class="text-left w-96" disabled style="border-radius: 1rem !important;"
						{{-- placeholder="> {{ \Illuminate\Support\Str::of(url()->current())->ltrim('http://127.0.0.1:8080') }}"/> --}}
						{{-- placeholder="> {{ \Illuminate\Support\Str::of(url()->current())->afterLast('/', '/') }}"/> --}}
						placeholder="> {{ \Illuminate\Support\Str::of(url()->current())->ltrim('http://127.0.0.1:8080')->headline() }}"/>
						{{-- placeholder="> {{ \Illuminate\Support\Str::of(url()->current())->headline() }}"/> --}}
						{{-- <x-input class="text-center rounded-xl w-96" disabled placeholder="> {{ $search }}"/> --}}
						{{-- Ooga booga --}}
						{{-- {{ $header }} --}}
					</div>
				</div>

            </div>

			<div class="flex">
				<!-- Back button -->
				{{-- <div class="pt-6 text-center sm:px-6 lg:px-8">
					<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M3 16C3 15.3096 3.55964 14.75 4.25 14.75H24.7868L17.3547 7.12233C16.8729 6.62788 16.8832 5.83649 17.3777 5.35472C17.8721 4.87294 18.6635 4.88322 19.1453 5.37767L28.6424 15.1247C28.8804 15.3672 29 15.6834 29 16C29 16.3166 28.8804 16.6329 28.6422 16.8755L19.1453 26.6223C18.6635 27.1168 17.8721 27.1271 17.3777 26.6453C16.8832 26.1635 16.8729 25.3721 17.3547 24.8777L24.7868 17.25H4.25C3.55964 17.25 3 16.6904 3 16Z" fill="var(--svgcolor)"/>
					</svg>
				</div> --}}
				<!-- Current URL -->
				<div>
					@if (isset($header))
					<x-slot name="header" :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden sm:block">
						<div class="py-5 mx-auto text-center sm:px-6 lg:px-8">
							<x-input class="text-center rounded-xl w-96" disabled placeholder="> > {{ __('url()->current()') }}"/>
							{{-- Ooga booga --}}
							{{-- {{ $header }} --}}
						</div>
					</x-slot>
					@else

					@endif
				</div>
			</div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="relative ms-3">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

				<div x-data="{ window.themeSwitcher(): $persist(false) }" x-init="switchTheme()" x-on:keydown.window.tab="switchOn = false" x-on:click="switchOn = !switchOn; $dispatch('switch-toggled', switchOn)">
				{{-- <div x-data="{window.themeSwitcher(): $persist(false)}" x-init="switchTheme()" @keydown.window.tab="switchOn = false" @click="switchOn = !switchOn; $dispatch('switch-toggled', switchOn)"> --}}
						<x-theme-switch />
				</div>

				@if ( Auth::check() )
				<div class="relative h-10 pl-1 ml-3 text-sm leading-4 text-gray-900 transition duration-150 ease-in-out bg-orange-400 dark:text-gray-900 hover:bg-orange-300 hover:text-black font-semibold"
                    style="border-radius: 0.7625rem; border: 1px solid rgba(255, 255, 255, 0.30); padding-top: 0.6875rem;">
						<div id="role" class="flex items-center justify-center px-3 m-auto">
							{{ Auth::user()->user_role }}
						</div>
				</div>
				@else
					{{ route('welcome') }}
				@endif

                <!-- Settings Dropdown -->
                <div class="relative pl-1 ml-3 text-sm font-normal leading-4 text-black transition duration-150 ease-in-out border-2 border-gray-500 dark:border-gray-400 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-100 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 hover:border-blue-600 border-opacity-30"
                    style="border-radius: 1.5625rem 3.125rem 3.125rem 1.5625rem;">
					<x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos() && Auth::check())
                                {{-- <button class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                                    <img class="object-cover w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button> --}}
								<div class="flex">
                                <span class="inline-flex items-center px-3 py-2 ">
                                    {{ Auth::user()->name }}
                                </span>
                                <button
                                    class="flex text-sm transition border-2 border-transparent border-gray-500 rounded-full focus:outline-none focus:border-gray-300 border-opacity-30">
                                    <img class="object-cover w-8 h-8 rounded-full"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            </div>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700">
                                        {{-- {{ Auth::user()->name }} --}}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content" style="z-index: 9999;">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

							<x-dropdown-link href="{{ route('user-profile.show', Auth::user()->id) }}" :active="request()->routeIs('user-profile.show')">
								{{ __('View/Edit Profile') }}
							</x-dropdown-link>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Edit Account Settings') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200 dark:border-gray-600"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                        @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 me-3">
                        <img class="object-cover w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="text-base font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
				 <!-- Public Profile View -->
                <x-responsive-nav-link href="{{ route('user-profile.show', Auth::user()->id) }}" :active="request()->routeIs('user-profile.show')">
                    {{ __('View/Edit Profile') }}
                </x-responsive-nav-link>

                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Edit Account Settings ') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-responsive-nav-link href="{{ route('logout') }}"
                        @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200 dark:border-gray-600"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <!-- Team Switcher -->
                    @if (Auth::user()->allTeams()->count() > 1)
                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" />
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
</nav>
