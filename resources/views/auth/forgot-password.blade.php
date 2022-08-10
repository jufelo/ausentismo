<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
        <div class="sm:max-w-lg">
            <div class="mb-4 text-sm text-gray-600">
                {{ __('¿Olvidaste tu contraseña? Por favor, ingrese su correo electrónico y le enviaremos un enlace de restablecimiento de contraseña que le permitirá elegir una nueva.') }}
            </div>
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <x-jet-validation-errors class="mb-4"/>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="block">
                    <x-jet-label for="email" value="{{ __('Correo electrónico') }}"/>
                    <x-jet-input id="email" class="block mt-1 w-full inputs-icon" type="email" name="email"
                                 :value="old('email')" required autofocus/>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button class="bg-navy">
                        {{ __('Enviar enlace') }}
                    </x-jet-button>
                </div>
            </form>
        </div>

    </x-jet-authentication-card>
</x-guest-layout>
