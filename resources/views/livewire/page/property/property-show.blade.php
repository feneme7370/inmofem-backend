<div>
    {{-- breadcrum, title y button --}}
    <x-pages.breadcrums.breadcrum 
    title_1="Inicio"
    link_1="{{ route('dashboard.index') }}"
    title_2="Propiedades"
    link_2="{{ route('properties.index') }}"
    title_3="Ver Propiedad"
    link_3="{{ route('properties.index') }}"
    />

<x-pages.menus.title-and-btn>

    @slot('title')
    <x-pages.titles.title-pages title="Propiedad"/>
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

</x-pages.menus.title-and-btn>
{{-- end breadcrum, title y button --}}

          {{-- form datos --}}
          <x-pages.forms.jetstream.form-section submit="save">
            <x-slot name="title">
              {{ __('Datos') }}
            </x-slot>
    
            <x-slot name="description">
              {{ __('Datos sobre precio y ubicacion.') }}
            </x-slot>
    
            <x-slot name="form">
              <div class="grid gap-2 w-full">
                <h2 class="text-center">{{ $property->title }}</h2>
                <p class="text-sm italic">{{ $property->money->signo }} {{ number_format($property->price, 2,",",".") }}</p>

                @if ($property->address)<p class="text-sm italic">{{ $property->address }}</p>@endif
                @if ($property->city)<p class="text-sm italic">{{ $property->city }}</p>@endif
                @if ($property->country)<p class="text-sm italic">{{ $property->country }}</p>@endif
                @if ($property->latitude)<p class="text-sm italic">{{ $property->latitude }}</p>@endif
                @if ($property->longitude)<p class="text-sm italic">{{ $property->longitude }}</p>@endif
                @if ($property->maps)<p class="text-sm italic">{{ $property->maps }}</p>@endif

              </div>
            </x-slot>
    
            <x-slot name="actions">
            </x-slot>
    
          </x-pages.forms.jetstream.form-section>

          {{-- form descriptions --}}
          <x-pages.forms.jetstream.form-section submit="save">
            <x-slot name="title">
              {{ __('Descripcion') }}
            </x-slot>
    
            <x-slot name="description">
              {{ __('Descripciones de la propiedad y tipo.') }}
            </x-slot>
    
            <x-slot name="form">
              <div class="grid gap-2 w-full">

                <p class="text-sm italic font-bold text-center">Datos</p>

                @if ($property->description)
                <p class="text-sm italic whitespace-pre-wrap">{{ $property->description }}</p>
                @endif

                <p class="text-sm italic whitespace-pre-wrap">{{ $property->status ? 'Activo' : 'Inactivo' }}</p>
                
                <p class="text-sm italic whitespace-pre-wrap">Metodo: {{ $property->method->name }}</p>
                <p class="text-sm italic whitespace-pre-wrap">Tipo: {{ $property->property_type->name }}</p>

                  
              </div>

              <x-pages.forms.validation-errors class="mb-4" />
            </x-slot>
    
            <x-slot name="actions">
            </x-slot>
    
          </x-pages.forms.jetstream.form-section>

          {{-- form details --}}
          <x-pages.forms.jetstream.form-section submit="save">
            <x-slot name="title">
              {{ __('Detalles') }}
            </x-slot>
    
            <x-slot name="description">
              {{ __('Detalles de la propiedad.') }}
            </x-slot>
    
            <x-slot name="form">
              <div class="grid gap-2 w-full">

                <p class="text-sm italic font-bold text-center">Detalles</p>

                <p class="text-sm italic">Habitaciones: {{ $property->bedrooms }}</p>
                <p class="text-sm italic">Baños: {{ $property->bathrooms }}</p>
                <p class="text-sm italic">Metros: {{ $property->size }}</p>


                <p class="text-sm italic">Garage: {{ $property->garage ? 'Si' : 'No' }}</p>
                <p class="text-sm italic">Patio: {{ $property->yard ? 'Si' : 'No' }}</p>

                  
              </div>

              <x-pages.forms.validation-errors class="mb-4" />
            </x-slot>
    
            <x-slot name="actions">
            </x-slot>
    
          </x-pages.forms.jetstream.form-section>

          {{-- form features --}}
          <x-pages.forms.jetstream.form-section submit="save">
            <x-slot name="title">
              {{ __('Caracteristicas') }}
            </x-slot>
    
            <x-slot name="description">
              {{ __('Caracteristicas de la propiedade.') }}
            </x-slot>
    
            <x-slot name="form">
              <div class="grid gap-2 w-full">

                <p class="text-sm italic font-bold text-center">Caracteristicas</p>
  

                @foreach ($property->features->groupBy('category') as $category => $featuresInCategory)
                <p class="mb-1 font-bold">{{ $category }}</p>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-1">
                  @foreach ($featuresInCategory as $feature)
                    <p class="text-xs italic">{{ $feature->name }}</p>
                  @endforeach
                </div>
              @endforeach

                  
              </div>

              <x-pages.forms.validation-errors class="mb-4" />
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
              {{ __('Portada e Imagenes adicionales.') }}
            </x-slot>
    
            <x-slot name="form">
              <p class="text-sm italic font-bold text-center">Imagenes</p>
              <div class="grid grid-cols-3 gap-2 w-full">

              @if ($this->property->allPictures->where('type', 'image_cover')->first())
              <div class="grid text-center gap-1">
                <p class="text-sm italic">Portada</p>
                <x-pages.libraries.lightbox.img-lightbox 
                    class="mx-auto rounded-xl"
                    class_w_h="h-32 w-32"
                    name="{{ $this->property->allPictures->where('type', 'image_cover')->first()->path_jpg }}"   
                />
              </div>
              @endif

              @if ($images)
              @foreach ($images as $item)
                
              <div class="grid text-center gap-1">
                <p class="text-sm italic">Imagen Adicional</p>
                <x-pages.libraries.lightbox.img-lightbox 
                    class="mx-auto rounded-xl"
                    class_w_h="h-32 w-32"
                    name="{{ $item->path_jpg }}"   
                />
              </div>
              @endforeach
              @endif

              </div>

              <x-pages.forms.validation-errors class="mb-4" />
            </x-slot>
    
            <x-slot name="actions">
                <x-pages.buttons.primary-link 
                title="Volver" 
                href="{{ route('properties.index') }}"
                >
                
                @slot('icon')
                    {{-- <x-pages.icons.for-icons-app icon="plus" class="w-6 h-6"/> --}}
                @endslot
        
                </x-pages.buttons.primary-link>
    
            </x-slot>
    
          </x-pages.forms.jetstream.form-section>
</div>
