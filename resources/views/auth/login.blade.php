<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="">
        <div class="max-w-md mx-auto">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Entrar</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Email') }}</label>
                    <input id="email"
                        class="block w-full p-3 border border-gray-300 rounded-lg shadow-sm bg-gray-50 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 dark:border-gray-400 dark:text-gray-700 dark:placeholder-gray-500 dark:focus:border-blue-400 dark:focus:ring-blue-400"
                        type="email" name="email" :value="old('email')" required autofocus
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password"
                        class="block text-sm font-medium text-gray-700 mb-2">{{ __('Password') }}</label>
                    <input id="password"
                        class="block w-full p-3 border border-gray-300 rounded-lg shadow-sm bg-gray-50 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 dark:border-gray-400 dark:text-gray-700 dark:placeholder-gray-500 dark:focus:border-blue-400 dark:focus:ring-blue-400"
                        type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-6">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 dark:border-gray-700 dark:focus:ring-blue-400"
                        name="remember">
                    <label for="remember_me"
                        class="ml-2 text-sm text-gray-600 dark:text-gray-800">{{ __('Remember me') }}</label>
                </div>

                <div class="flex items-center justify-between mb-6">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                            href="{{ route('password.request') }}">
                            {{ __('¿Olvidate tu contraseña?') }}
                        </a>
                    @endif

                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium rounded-lg shadow-sm hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        {{ __('Entrar') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
