<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <h3 class="fw-bold login-text mb-3 text-center text-navy">Iniciar Sesión</h3>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                {{--                <x-jet-label for="email" value="{{ __('Correo electrónico') }}" />--}}
                <div class="position-relative">
                    <i class="fas fa-user ms-3 pe-none position-absolute translate-middle-y top-50"></i>
                    <x-jet-input id="email" class="block inputs-icon w-100 w-full" type="email" name="email" :value="old('email')" placeholder="Correo electrónico" required autofocus />
                </div>
            </div>

            <div class="mb-2">
                <div class="position-relative">
                    {{--                <x-jet-label for="password" value="{{ __('Contraseña') }}" />--}}
                    <i class="fas fa-unlock-keyhole ms-3 pe-none position-absolute translate-middle-y top-50"></i>
                    <x-jet-input id="password" class="block inputs-icon w-100 w-full" type="password" name="password" disabled placeholder="Contraseña" required autocomplete="current-password" />
                    <i class="far fa-eye btn show-hide pe-none position-absolute translate-middle-y end-0 top-50 class_title" data-title="Mostrar"></i>
                </div>
            </div>

            <div class="block">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recuérdame') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-5">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4 bg-navy" id="send_btn" disabled>
                    {{ __('Ingresar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
