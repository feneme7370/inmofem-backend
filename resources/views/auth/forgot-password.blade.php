<x-guest-layout>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 ">
        <div
          class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl "
        >
          <div class="flex flex-col overflow-y-auto md:flex-row">
            <div class="h-32 md:h-auto md:w-1/2">
              <img
                aria-hidden="true"
                class="object-cover w-full h-full"
                src="{{asset('sistem/img/image-forgot.jpg')}}"
                alt="Office"
              />
            </div>
            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
              <div class="w-full">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <h1
                    class="mb-4 text-xl font-semibold text-gray-700 "
                    >
                    Olvidaste tu clave?
                    </h1>

                    <x-pages.forms.validation-errors class="mb-4" />

                    <x-pages.forms.label-form for="email" value="{{ __('Email') }}" />
                    <x-pages.forms.input-form id="email" type="email" placeholder="{{ __('Email') }}" :value="old('email')" name="email" wire:model="email"
                    autofocus />
    
                    <!-- You should  use a button here, as the anchor is only used for the example  -->
                    @if (session('status'))
                      <div class="mb-4 font-medium text-sm text-green-600">
                          {{-- {{ session('status') }} --}}
                          <p>Revise su email, e ingrese para poder cambiar su clave</p>
                      </div>
                  @endif

                
                    <x-pages.buttons.primary-btn type="submit" class="w-full mt-4" wire:loading.attr="disabled" title="Recuperar"/>      

                </form>

                <hr class="my-8" />

                <p class="mt-1">
                    <a
                      class="text-sm font-medium text-primary-600  hover:underline"
                      href="{{route('login')}}"
                    >
                      Iniciar sesion
                    </a>
                  </p>
              </div>
            </div>
          </div>
        </div>
      </div>
</x-guest-layout>
