<x-guest-layout>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <p class="text-center text-3xl">
                <span class="font-bold">Inmo</span>Fem
            </p>
        </div>
    
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <x-pages.forms.validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}">
                @csrf
    
                <div>
                    <x-pages.forms.label-form for="mastercode" value="{{ __('Mastercode') }}" />
                    <x-pages.forms.input-form id="mastercode" class="block mt-1 w-full" type="text" name="mastercode" required autofocus/>
                </div>
    
                <div>
                    <x-pages.forms.label-form for="name" value="{{ __('Nombre') }}" />
                    <x-pages.forms.input-form id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autocomplete="name" />
                </div>
    
                <div>
                    <x-pages.forms.label-form for="lastname" value="{{ __('Apellido') }}" />
                    <x-pages.forms.input-form id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autocomplete="lastname" />
                </div>
    
                <div class="mt-4">
                    <x-pages.forms.label-form for="email" value="{{ __('Email') }}" />
                    <x-pages.forms.input-form id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>
    
                <div class="mt-4">
                    <x-pages.forms.label-form for="password" value="{{ __('Clave') }}" />
                    <x-pages.forms.input-form id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>
    
                <div class="mt-4">
                    <x-pages.forms.label-form for="password_confirmation" value="{{ __('Confirmar clave') }}" />
                    <x-pages.forms.input-form id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
    
                {{-- @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-pages.forms.label-form for="terms">
                            <div class="flex items-center">
                                <x-pages.forms.checkbox-form name="terms" id="terms" required />
    
                                <div class="ms-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-pages.forms.label-form>
                    </div>
                @endif --}}
    
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Ya esta registrado?') }}
                    </a>
    
                    <x-pages.buttons.primary-btn type="submit" class="ms-4">
                        {{ __('Registrar') }}
                    </x-pages.buttons.primary-btn>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
