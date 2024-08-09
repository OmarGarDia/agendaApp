<x-guest-layout>
    <div class="">
        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ __('Reestablecer contraseña') }}</h1>
            <p class="text-gray-600 text-sm">
                {{ __('Introduce tu email y te enviaremos un link para resetear la contraseña.') }}</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Form -->
        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf

            <!-- Email Address -->
            <div class="relative">
                <label for="email" class="block text-gray-700 text-sm font-medium">{{ __('Email') }}</label>
                <input id="email"
                    class="block w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm bg-gray-50 text-gray-900 placeholder-gray-500 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-150 ease-in-out"
                    type="email" name="email" :value="old('email')" required autofocus
                    placeholder="you@ejemplo.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-center">
                <button type="submit"
                    class="w-full py-3 px-4 bg-indigo-600 text-white rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                    {{ __('Enviar enlace para reestablecer') }}
                </button>
            </div>
        </form>

        <!-- Back to Login Link -->
        <div class="mt-6 text-center">
            <a href="{{ route('login') }}"
                class="text-indigo-600 hover:text-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-150 ease-in-out text-sm">
                {{ __('Volver al login') }}
            </a>
        </div>
    </div>
</x-guest-layout>
