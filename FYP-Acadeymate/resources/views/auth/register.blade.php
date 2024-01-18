<x-guest-layout>
@section('title', "Register - Acadeymate")
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"  autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"  autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block w-full mt-1" type="password" name="password"  autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation"  autocomplete="new-password" />
            </div>

            <div class="mt-4" >
                <x-label for="user_role" value="{{ __('Register As') }}" />
					<div align="left" class="block mt-1 w-full">

						<select name="user_role" class="block pt-2 pb-2 mt-1 w-full bg-white text-black border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white h-11 dark:hover:border-orange-500 focus:border-orange-500 dark:focus:text-white dark:focus:border-orange-600 focus:ring-orange-500 dark:focus:ring-orange-600 transition-all duration-500 hover:border-orange-500'">
								<option name="user_role" value="" selected disabled>
									Select one
								</option>
								<option option="1" name="user_role" value="Educational Institute Admin" x-on:click="option_value = 'Educational Institute Administrator'" >
									Educational Institute Administrator
								</option>
								<option option="2" name="user_role" value="Lecturer" x-on:click="option_value = 'Lecturer'">
									Lecturer
								</option>
								<option option="3" name="user_role" value="Student" x-on:click="option_value = 'Student'">
									Student
								</option>
								<option option="4" name="user_role" value="Guardian" x-on:click="option_value = 'Guardian'">
									Guardian
								</option>
								<option option="5" name="user_role" value="Developer/Super Admin" x-on:click="option_value = 'Developer/Super Admin'" >
									Developer/Super Admin
								</option>
							{{-- </div>
						</x-slot> --}}
						</select>

					</div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms"  />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
