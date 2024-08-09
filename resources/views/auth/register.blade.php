<x-guest-layout>
    <div class="">
        <div class="max-w-md mx-auto">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Registro</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Name') }}</label>
                    <input id="name"
                        class="block w-full p-3 border border-gray-300 rounded-lg shadow-sm bg-gray-50 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 dark:border-gray-400 dark:text-gray-700 dark:placeholder-gray-500 dark:focus:border-blue-400 dark:focus:ring-blue-400"
                        type="text" name="name" value="{{ old('name') }}" required autofocus
                        autocomplete="name" />
                    @error('name')
                        <div class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="mb-6">
                    <label for="email"
                        class="block text-sm font-medium text-gray-700 mb-2">{{ __('Email') }}</label>
                    <input id="email"
                        class="block w-full p-3 border border-gray-300 rounded-lg shadow-sm bg-gray-50 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 dark:border-gray-400 dark:text-gray-700 dark:placeholder-gray-500 dark:focus:border-blue-400 dark:focus:ring-blue-400"
                        type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
                    @error('email')
                        <div class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password"
                        class="block text-sm font-medium text-gray-700 mb-2">{{ __('Password') }}</label>
                    <input id="password"
                        class="block w-full p-3 border border-gray-300 rounded-lg shadow-sm bg-gray-50 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 dark:border-gray-400 dark:text-gray-700 dark:placeholder-gray-500 dark:focus:border-blue-400 dark:focus:ring-blue-400"
                        type="password" name="password" required autocomplete="new-password" />
                    @error('password')
                        <div class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label for="password_confirmation"
                        class="block text-sm font-medium text-gray-700 mb-2">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation"
                        class="block w-full p-3 border border-gray-300 rounded-lg shadow-sm bg-gray-50 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 dark:border-gray-400 dark:text-gray-700 dark:placeholder-gray-500 dark:focus:border-blue-400 dark:focus:ring-blue-400"
                        type="password" name="password_confirmation" required autocomplete="new-password" />
                    @error('password_confirmation')
                        <div class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-between mt-6">
                    <a class="text-sm text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium rounded-lg shadow-sm hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
