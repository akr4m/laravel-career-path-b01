<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>

         <div class="mt-8">
        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="w-full border-t border-gray-200 dark:border-gray-700"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="bg-white dark:bg-gray-900 px-3 text-xs font-medium tracking-wide text-gray-500 dark:text-gray-400 uppercase">Or continue with</span>
            </div>
        </div>
    </div>

    <div class="flex flex-col gap-3">
            <a href="{{route('social.redirect', 'facebook')}}"
               class="group inline-flex items-center justify-center gap-2 rounded-lg border border-transparent bg-[#1877F2] px-4 py-2 text-sm font-medium text-white hover:bg-[#166FE0] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#1877F2]/70 focus-visible:ring-offset-2 focus-visible:ring-offset-white dark:focus-visible:ring-offset-gray-900 shadow-sm transition-colors">
                <svg class="h-4 w-4" viewBox="0 0 24 24" aria-hidden="true" role="img">
                    <path fill="currentColor" d="M22.675 0H1.325A1.326 1.326 0 0 0 0 1.325v21.35C0 23.403.597 24 1.325 24h11.495v-9.294H9.691v-3.622h3.129V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.796.715-1.796 1.764v2.314h3.587l-.467 3.622h-3.12V24h6.116A1.326 1.326 0 0 0 24 22.675V1.325A1.326 1.326 0 0 0 22.675 0Z"/>
                </svg>
                <span>Continue with Facebook</span>
            </a>
            <a href="{{route('social.redirect', 'github')}}"
               class="group inline-flex items-center justify-center gap-2 rounded-lg border border-gray-800 bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-black focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-700 focus-visible:ring-offset-2 focus-visible:ring-offset-white dark:focus-visible:ring-offset-gray-900 shadow-sm transition-colors">
                <svg class="h-5 w-5" viewBox="0 0 24 24" aria-hidden="true" role="img">
                    <path fill="currentColor" fill-rule="evenodd" d="M12 .5C5.648.5.5 5.648.5 12c0 5.088 3.292 9.387 7.865 10.905.575.114.785-.246.785-.552 0-.273-.01-1.15-.016-2.087-3.2.695-3.874-1.357-3.874-1.357-.523-1.328-1.278-1.682-1.278-1.682-1.045-.715.079-.701.079-.701 1.155.081 1.764 1.187 1.764 1.187 1.028 1.762 2.697 1.253 3.354.958.104-.745.402-1.253.732-1.54-2.554-.291-5.238-1.277-5.238-5.685 0-1.255.45-2.282 1.187-3.087-.12-.29-.515-1.463.112-3.05 0 0 .967-.31 3.17 1.18a11.07 11.07 0 0 1 2.886-.388c.98.005 1.967.132 2.888.388 2.2-1.49 3.165-1.18 3.165-1.18.629 1.587.234 2.76.115 3.05.74.805 1.185 1.832 1.185 3.087 0 4.42-2.69 5.389-5.255 5.674.414.355.782 1.053.782 2.125 0 1.534-.014 2.77-.014 3.146 0 .308.207.672.79.55C20.213 21.383 23.5 17.085 23.5 12c0-6.352-5.148-11.5-11.5-11.5Z" clip-rule="evenodd"/>
                </svg>
                <span>Continue with GitHub</span>
            </a>
        </div>
    </form>
</x-guest-layout>
