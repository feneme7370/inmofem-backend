<div>
    {{-- breadcrum, title y button --}}
    <x-pages.breadcrums.breadcrum 
    title_1="Inicio"
    link_1="{{ route('dashboard.index') }}"
    title_2="Propiedades"
    link_2="{{ route('properties.index') }}"
    title_3="{{ $property ? 'Editar Propiedad' : 'Crear Propiedad' }}"
    link_3="{{ route('properties.create') }}"
    />

<x-pages.menus.title-and-btn>

    @slot('title')
    <x-pages.titles.title-pages title="Propiedades"/>
    @endslot

    @slot('button')
        <x-pages.buttons.primary-link 
        title="Volver" 
        href="{{ route('properties.index') }}"
        >
        
        @slot('icon')
            {{-- <x-pages.icons.for-icons-app icon="plus" class="w-6 h-6"/> --}}
        @endslot

        </x-pages.buttons.primary-link>
    @endslot

    {{-- mensaje de alerta --}}
    <x-pages.notifications.alerts :messageSuccess="session('messageSuccess')"
        :messageError="session('messageError')" 
    />

</x-pages.menus.title-and-btn>
{{-- end breadcrum, title y button --}}

<div class="mb-4 border-b border-gray-200 dark:border-gray-700">
  <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">
      <li class="me-2" role="presentation">
          <button class="inline-block p-4 border-b-2 rounded-t-lg" id="dates-styled-tab" data-tabs-target="#styled-dates" type="button" role="tab" aria-controls="dates" aria-selected="true">Datos</button>
      </li>
      <li class="me-2" role="presentation">
          <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="details-styled-tab" data-tabs-target="#styled-details" type="button" role="tab" aria-controls="details" aria-selected="false">Detalles</button>
      </li>
      <li class="me-2" role="presentation">
          <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="methods-styled-tab" data-tabs-target="#styled-methods" type="button" role="tab" aria-controls="methods" aria-selected="false">Metodos</button>
      </li>
      <li role="presentation">
          <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="features-styled-tab" data-tabs-target="#styled-features" type="button" role="tab" aria-controls="features" aria-selected="false">Caracteristicas</button>
      </li>
  </ul>
</div>
<div id="default-styled-tab-content">

  <div class="p-4 rounded-lg bg-purple-50 dark:bg-gray-800" id="styled-dates" role="tabpanel" aria-labelledby="dates-tab">
          {{-- form datos --}}
          <x-pages.forms.jetstream.form-section submit="save">
            <x-slot name="title">
              {{ __('Datos') }}
            </x-slot>
    
            <x-slot name="description">
              {{ __('Datos de la propiedad.') }}
            </x-slot>
    
            <x-slot name="form">
              <div class="grid gap-2 w-full">
                  <div>
                      <x-pages.forms.label-form for="title" value="{{ __('Titulo *') }}" />
                      <x-pages.forms.input-form id="title" type="title"
                          placeholder="{{ __('Titulo') }}" wire:model="title" />
                      <x-pages.forms.input-error for="title" />
                  </div>

                  <div class="flex gap-1">
                      <div class="w-full max-w-20">
                        <x-pages.forms.label-form for="money_id" value="{{ __('Moneda *') }}" class="truncate"/>
                        <x-pages.forms.select-form wire:model="money_id" id="money_id" value_placeholder="-- Ver --">
                          @foreach ($monies as $money)
                              <option value="{{$money->id}}">{{$money->signo}}</option>
                          @endforeach
                        </x-pages.forms.select-form>
                        <x-pages.forms.input-error for="money_id" />
                      </div>
    
                      <div class="w-full">
                          <x-pages.forms.label-form for="price" value="{{ __('Precio *') }}" />
                          <x-pages.forms.input-form id="price" type="numeric"
                              placeholder="{{ __('Precio') }}" wire:model="price" />
                          <x-pages.forms.input-error for="price" />
                      </div>
                  </div>

                  <div>
                      <x-pages.forms.label-form for="address" value="{{ __('Direccion') }}" />
                      <x-pages.forms.input-form id="address" type="text"
                          placeholder="{{ __('Direccion') }}" wire:model="address" />
                      <x-pages.forms.input-error for="address" />
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

  </div>
  <div class="hidden p-4 rounded-lg bg-purple-50 dark:bg-gray-800" id="styled-details" role="tabpanel" aria-labelledby="details-tab">
          {{-- form details --}}
          <x-pages.forms.jetstream.form-section submit="save">
            <x-slot name="title">
              {{ __('Datos') }}
            </x-slot>
    
            <x-slot name="description">
              {{ __('Detalles de la propiedad.') }}
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
                    <x-pages.forms.label-form for="bedrooms" value="{{ __('Habitaciones *') }}" />
                    <x-pages.forms.input-form id="bedrooms" type="numeric"
                        placeholder="{{ __('Habitaciones') }}" wire:model="bedrooms" />
                    <x-pages.forms.input-error for="bedrooms" />
                </div>
                <div>
                    <x-pages.forms.label-form for="bathrooms" value="{{ __('Baños *') }}" />
                    <x-pages.forms.input-form id="bathrooms" type="numeric"
                        placeholder="{{ __('Baños') }}" wire:model="bathrooms" />
                    <x-pages.forms.input-error for="bathrooms" />
                </div>
                <div>
                    <x-pages.forms.label-form for="size" value="{{ __('Metros Cuadrados *') }}" />
                    <x-pages.forms.input-form id="size" type="text"
                        placeholder="{{ __('Metros Cuadrados') }}" wire:model="size" />
                    <x-pages.forms.input-error for="size" />
                </div>
                  <div>
                    <x-pages.forms.label-form value="{{ 'Garage' }}">
                      <x-pages.forms.checkbox-form class="" wire:model="garage" value="" />
                    </x-pages.forms.label-form>
                  </div>
                  <div>
                    <x-pages.forms.label-form value="{{ 'Patio' }}">
                      <x-pages.forms.checkbox-form class="" wire:model="yard" />
                    </x-pages.forms.label-form>
                  </div>
                  @if ($property)
                  <div>
                    <x-pages.forms.label-form value="{{ 'Estado' }}">
                      <x-pages.forms.checkbox-form class="" wire:model="status" />
                    </x-pages.forms.label-form>
                  </div>
                  @endif
                  
              </div>

            </x-slot>
    
            <x-slot name="actions">
            </x-slot>
    
          </x-pages.forms.jetstream.form-section>
  </div>
  <div class="hidden p-4 rounded-lg bg-purple-50 dark:bg-gray-800" id="styled-methods" role="tabpanel" aria-labelledby="methods-tab">
          {{-- form methods --}}
          <x-pages.forms.jetstream.form-section submit="save">
            <x-slot name="title">
              {{ __('Datos') }}
            </x-slot>
    
            <x-slot name="description">
              {{ __('Metodos y tipos.') }}
            </x-slot>
    
            <x-slot name="form">
              <div class="grid gap-2 w-full">

                <x-pages.forms.label-form value="Metodo *"/>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 w-full">
                  @foreach ($methods as $method)
                    <div>
                      <x-pages.forms.label-form value="{{ $method->name }}">
                        <x-pages.forms.radio-form class="" wire:model="method_id" value="{{ $method->id }}" />
                      </x-pages.forms.label-form>
                    </div>
                  @endforeach
                </div>

                <div>
                    <x-pages.forms.label-form for="property_type_id" value="{{ __('Tipo *') }}" />
                    <x-pages.forms.select-form wire:model="property_type_id" id="property_type_id" value_placeholder="-- Seleccionar --">
                      @foreach ($property_types as $property_type)
                          <option value="{{$property_type->id}}">{{$property_type->name}}</option>
                      @endforeach
                    </x-pages.forms.select-form>
                    <x-pages.forms.input-error for="method_id" />
                  </div>

                  
              </div>

            </x-slot>
    
            <x-slot name="actions">
            </x-slot>
    
          </x-pages.forms.jetstream.form-section>
  </div>
  <div class="hidden p-4 rounded-lg bg-purple-50 dark:bg-gray-800" id="styled-features" role="tabpanel" aria-labelledby="features-tab">
          {{-- form features --}}
          <x-pages.forms.jetstream.form-section submit="save">
            <x-slot name="title">
              {{ __('Caracteristicas') }}
            </x-slot>
    
            <x-slot name="description">
              {{ __('Selecciones la caracteristicas de la propiedad.') }}
            </x-slot>
    
            <x-slot name="form">
              <div class="grid gap-2 w-full">

                <x-pages.forms.label-form value="Caracteristicas"/>
                <div class="grid gap-2 w-full">

                  @foreach ($features->groupBy('category') as $category => $featuresInCategory)
                    <p class="mb-3">{{ $category }}</p>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-1">
                      @foreach ($featuresInCategory as $feature)
                          <div class="flex justify-start items-start">
                              <x-pages.forms.label-form value="{{ $feature->name }}">
                                  <x-pages.forms.checkbox-form wire:model="property_features" value="{{ $feature->id }}" />
                              </x-pages.forms.label-form>
                          </div>
                      @endforeach
                    </div>
                  @endforeach


                </div>


                  
              </div>

            </x-slot>
    
            <x-slot name="actions">
            </x-slot>
    
          </x-pages.forms.jetstream.form-section>
  </div>
  
</div>

<div class="my-5 p-4 rounded-lg bg-purple-50 dark:bg-gray-800"">
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
              {{-- imagenes de la propiedad --}}
              <div>
                <x-pages.forms.label-form for="image_additional" value="Imagenes adicionales" />
                <x-pages.forms.input-file-form multiple id="image_additional" description="JPG, JPEG, PNG o GIF (Max. 5 mb)" wire:model.live="image_additional" accept="image/*"
                    />
                <x-pages.forms.input-error for="image_additional" />
            </div>
  
            @if ($imageAdditional)
                
            <div class="grid grid-cols-5 gap-1">
                @foreach ($imageAdditional as $item)
                <div class="flex flex-col justify-center items-center gap-1">
                    <x-pages.libraries.lightbox.img-lightbox 
                        class="mx-auto rounded-xl"
                        class_w_h="h-16 w-16"
                        name="{{ $item->path_jpg }}"   
                    />
                    <x-pages.buttons.primary-btn 
                    title="Borrar" 
                    wire:click="{{ 'deleteImageAdditional(' . $item->id . ', ' . $item->type . ')' }}" 
                    >
                    
                    @slot('icon')
                        {{-- <x-sistem.icons.for-icons-app icon="trash" class_w_h="h-4 w-4"/> --}}
                    @endslot
          
                  </x-pages.buttons.primary-btn>
                </div>
                @endforeach
            </div>
            @endif
          </div>
  
  
          <x-pages.spinners.loading-spinner wire:loading.delay />
  
          
      </div>
  
    </x-slot>
  
    <x-slot name="actions">
  
    </x-slot>
  
  </x-pages.forms.jetstream.form-section>
</div>

<x-pages.forms.validation-errors class="mb-4" />

<div class="flex justify-end items-center gap-2 mt-4">
  <x-pages.buttons.normal-link 
  title="Cancelar"
  href="{{ route('properties.index') }}" 
  >
  </x-pages.buttons.primary-link>
  
  <x-pages.buttons.primary-btn 
  title="{{$property ? 'Actualizar' : 'Guardar'}}" 
  wire:click="save" 
  >
  </x-pages.buttons.primary-btn>
</div>








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
