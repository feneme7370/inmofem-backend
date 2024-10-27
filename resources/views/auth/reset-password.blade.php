<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <p class="text-center text-3xl">
                <span class="font-bold">Inmo</span>Fem
            </p>
        </div>
    
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <x-pages.forms.validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
    
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
    
                <div class="block">
                    <x-pages.forms.label-form for="email" value="{{ __('Email') }}" />
                    <x-pages.forms.input-form id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                </div>
    
                <div class="mt-4">
                    <x-pages.forms.label-form for="password" value="{{ __('Clave') }}" />
                    <x-pages.forms.input-form id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>
    
                <div class="mt-4">
                    <x-pages.forms.label-form for="password_confirmation" value="{{ __('Confirmar clave') }}" />
                    <x-pages.forms.input-form id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    <x-pages.buttons.primary-btn type="submit">
                        {{ __('Restablecer clave') }}
                    </x-pages.buttons.primary-btn>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
