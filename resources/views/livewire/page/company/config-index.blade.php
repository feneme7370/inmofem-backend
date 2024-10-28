<div>
    {{-- breadcrum, title y button --}}
    <x-pages.breadcrums.breadcrum 
    title_1="Inicio"
    link_1="{{ route('dashboard.index') }}"
    title_2="Editar Empresa"
    link_2="{{ route('config.index') }}"
    />

<x-pages.menus.title-and-btn>

    @slot('title')
    <x-pages.titles.title-pages title="Empresa"/>
    @endslot

    @slot('button')
        <x-pages.buttons.primary-link 
        title="Volver" 
        href="{{ route('config.index') }}"
        >
        
        @slot('icon')
            {{-- <x-pages.icons.for-icons-app icon="plus" class="w-6 h-6"/> --}}
        @endslot

        </x-pages.buttons.primary-link>
    @endslot

</x-pages.menus.title-and-btn>
{{-- end breadcrum, title y button --}}

          {{-- form datos --}}
          <x-pages.forms.jetstream.form-section submit="save">
            <x-slot name="title">
              {{ __('Datos') }}
            </x-slot>
    
            <x-slot name="description">
              {{ __('Datos de la empresa.') }}
            </x-slot>
    
            <x-slot name="form">
              <div class="grid gap-2 w-full">
                  <div>
                      <x-pages.forms.label-form for="name" value="{{ __('Nombre') }}" />
                      <x-pages.forms.input-form id="name" type="name"
                          placeholder="{{ __('Nombre') }}" wire:model="name" />
                      <x-pages.forms.input-error for="name" />
                  </div>

                  <div>
                      <x-pages.forms.label-form for="email" value="{{ __('Email') }}" />
                      <x-pages.forms.input-form id="email" type="text"
                          placeholder="{{ __('Email') }}" wire:model="email" />
                      <x-pages.forms.input-error for="email" />
                  </div>

                  <div>
                      <x-pages.forms.label-form for="address" value="{{ __('Direccion') }}" />
                      <x-pages.forms.input-form id="address" type="text"
                          placeholder="{{ __('Direccion') }}" wire:model="address" />
                      <x-pages.forms.input-error for="address" />
                  </div>

                  <div>
                      <x-pages.forms.label-form for="phone" value="{{ __('Telefono') }}" />
                      <x-pages.forms.input-form id="phone" type="text"
                          placeholder="{{ __('Telefono') }}" wire:model="phone" />
                      <x-pages.forms.input-error for="phone" />
                  </div>

                  <div>
                      <x-pages.forms.label-form for="city" value="{{ __('Ciudad') }}" />
                      <x-pages.forms.input-form id="city" type="text"
                          placeholder="{{ __('Ciudad') }}" wire:model="city" />
                      <x-pages.forms.input-error for="city" />
                  </div>

                  <div>
                      <x-pages.forms.label-form for="country" value="{{ __('Pais') }}" />
                      <x-pages.forms.input-form id="country" type="text"
                          placeholder="{{ __('Pais') }}" wire:model="country" />
                      <x-pages.forms.input-error for="country" />
                  </div>

              </div>
            </x-slot>
    
            <x-slot name="actions">
            </x-slot>
    
          </x-pages.forms.jetstream.form-section>

          {{-- form descriptions --}}
          <x-pages.forms.jetstream.form-section submit="save">
            <x-slot name="title">
              {{ __('Datos') }}
            </x-slot>
    
            <x-slot name="description">
              {{ __('Descripciones de la empresa.') }}
            </x-slot>
    
            <x-slot name="form">
              <div class="grid gap-2 w-full">
                  <div>
                    <x-pages.forms.label-form for="description" value="{{ __('Descripcion') }}" />
                    <x-pages.forms.textarea-form id="description"
                        placeholder="{{ __('Descripcion') }}" wire:model="description" />
                    <x-pages.forms.input-error for="description" />
                  </div>

                  <div>
                    <x-pages.forms.label-form for="hero_description" value="{{ __('Descripcion de portada') }}" />
                    <x-pages.forms.textarea-form id="hero_description"
                        placeholder="{{ __('Descripcion de portada') }}" wire:model="hero_description" />
                    <x-pages.forms.input-error for="hero_description" />
                  </div>

                  <div>
                    <x-pages.forms.label-form for="time_description" value="{{ __('Descripcion de horarios') }}" />
                    <x-pages.forms.textarea-form id="time_description"
                        placeholder="{{ __('Descripcion de horarios') }}" wire:model="time_description" />
                    <x-pages.forms.input-error for="time_description" />
                  </div>

                  <div>
                    <x-pages.forms.label-form for="short_description" value="{{ __('Descripcion corta') }}" />
                    <x-pages.forms.textarea-form id="short_description"
                        placeholder="{{ __('Descripcion corta') }}" wire:model="short_description" />
                    <x-pages.forms.input-error for="short_description" />
                  </div>
                  
              </div>

            </x-slot>
    
            <x-slot name="actions">
            </x-slot>
    
          </x-pages.forms.jetstream.form-section>

          {{-- form images --}}
          <x-pages.forms.jetstream.form-section submit="save">
            <x-slot name="title">
              {{ __('Imagenes') }}
            </x-slot>
    
            <x-slot name="description">
              {{ __('Agregue imagenes.') }}
            </x-slot>
    
            <x-slot name="form">
              <div class="grid gap-2 w-full">
                  <div>
                      {{-- imagen del producto --}}
                      <x-pages.cards.upload-image 
                        new_image_file="{{$this->image_cover}}"
                        new_image_file_string="image_cover"
                        rotate="rotateImage"
                        delete="deleteImage"
                        imageable_id="{{ $imageCover->imageable_id ?? ''}}"
                        type="'image_cover'"
                        image_file_name="{{ $imageCover->path_jpg ?? '' }}"
                        title="Portada"
                        title_2="Imagen de portada"
                      />
                  </div>
                  <div>
                      {{-- imagen del producto --}}
                      <x-pages.cards.upload-image 
                        new_image_file="{{$this->image_logo}}"
                        new_image_file_string="image_logo"
                        rotate="rotateImage"
                        delete="deleteImage"
                        imageable_id="{{ $imageLogo->imageable_id ?? ''}}"
                        type="'image_logo'"
                        image_file_name="{{ $imageLogo->path_jpg ?? '' }}"
                        title="Logo"
                        title_2="Imagen de logo"
                      />
                  </div>


                  <x-pages.spinners.loading-spinner wire:loading.delay />

                  
              </div>

              <x-pages.forms.validation-errors class="mb-4" />
            </x-slot>
    
            <x-slot name="actions">
                <x-pages.buttons.normal-link 
                    title="Cancelar"
                    href="{{ route('config.index') }}" 
                >
                </x-pages.buttons.primary-link>
    
                <x-pages.buttons.primary-btn 
                    title="Actualizar" 
                    wire:click="save" 
                >
                </x-pages.buttons.primary-btn>
            </x-slot>
    
          </x-pages.forms.jetstream.form-section>

          @push('scripts')
          <script src="{{ asset('libraries/toastr/toastr-message.js') }}"></script>
          <script>
                Livewire.on('toastrError', (message) => {
                  toastrError(message)
                })
                Livewire.on('toastrSuccess', (message) => {
                  toastrSuccess(message)
                })
          </script>
          @endpush
</div>
