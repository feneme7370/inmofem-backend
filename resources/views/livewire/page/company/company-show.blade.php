<div>
        {{-- breadcrum, title y button --}}
        <x-pages.breadcrums.breadcrum 
        title_1="Inicio"
        link_1="{{ route('dashboard.index') }}"
        title_2="Empresas"
        link_2="{{ route('companies.index') }}"
        title_3="Ver Empresa"
        link_3="{{ route('companies.index') }}"
        />
    
    <x-pages.menus.title-and-btn>
    
        @slot('title')
        <x-pages.titles.title-pages title="Empresas"/>
        @endslot
    
        @slot('button')
            <x-pages.buttons.primary-link 
            title="Volver" 
            href="{{ route('companies.index') }}"
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
                  {{ __('Cree una empresa.') }}
                </x-slot>
        
                <x-slot name="form">
                  <div class="grid gap-2 w-full">
                    <h2 class="text-center">{{ $company->name }}</h2>
                    <p class="text-sm italic">{{ $company->email }}</p>
                    @if ($company->address)<p class="text-sm italic">{{ $company->address }}</p>@endif
                    @if ($company->phone)<p class="text-sm italic">{{ $company->phone }}</p>@endif
                    @if ($company->city)<p class="text-sm italic">{{ $company->city }}</p>@endif
                    @if ($company->country)<p class="text-sm italic">{{ $company->country }}</p>@endif
                    @if ($company->url)<p class="text-sm italic">{{ $company->url }}</p>@endif

                    <p class="text-sm italic">{{ $company->membership->name }}</p>
    
                  </div>
                </x-slot>
        
                <x-slot name="actions">
                </x-slot>
        
              </x-pages.forms.jetstream.form-section>
    
              {{-- form datos --}}
              <x-pages.forms.jetstream.form-section submit="save">
                <x-slot name="title">
                  {{ __('Descripcion') }}
                </x-slot>
        
                <x-slot name="description">
                  {{ __('Descripciones de la empresa.') }}
                </x-slot>
        
                <x-slot name="form">
                  <div class="grid gap-2 w-full">

                    @if ($company->description)
                    <p class="text-sm italic whitespace-pre-wrap">{{ $company->description }}</p>
                    @endif

                    @if ($company->hero_description)
                    <hr class=" border-purple-300 border-t my-1 w-2/5">
                    <p class="text-sm italic whitespace-pre-wrap">{{ $company->hero_description }}</p>
                    @endif

                    @if ($company->time_description)
                    <hr class=" border-purple-300 border-t my-1 w-2/5">
                    <p class="text-sm italic whitespace-pre-wrap">{{ $company->time_description }}</p>
                    @endif

                    @if ($company->short_description)
                    <hr class=" border-purple-300 border-t my-1 w-2/5">
                    <p class="text-sm italic whitespace-pre-wrap">{{ $company->short_description }}</p>
                    @endif

                    <p class="text-sm italic whitespace-pre-wrap">{{ $company->status ? 'Activo' : 'Inactivo' }}</p>
  
                      
                  </div>
    
                  <x-pages.forms.validation-errors class="mb-4" />
                </x-slot>
        
                <x-slot name="actions">
                </x-slot>
        
              </x-pages.forms.jetstream.form-section>
    
              {{-- form datos --}}
              <x-pages.forms.jetstream.form-section submit="save">
                <x-slot name="title">
                  {{ __('Imagenes') }}
                </x-slot>
        
                <x-slot name="description">
                  {{ __('Portada, Logo y QR.') }}
                </x-slot>
        
                <x-slot name="form">
                  <div class="grid grid-cols-3 gap-2 w-full">

                  @if ($this->company->allPictures->where('type', 'image_cover')->first())
                  <div class="grid text-center gap-1">
                    <p class="text-sm italic">Portada</p>
                    <x-pages.libraries.lightbox.img-lightbox 
                        class="mx-auto rounded-xl"
                        class_w_h="h-32 w-32"
                        name="{{ $this->company->allPictures->where('type', 'image_cover')->first()->path_jpg }}"   
                    />
                  </div>
                  @endif

                  @if ($this->company->allPictures->where('type', 'image_logo')->first())
                  <div class="grid text-center gap-1">
                    <p class="text-sm italic">Logo</p>
                    <x-pages.libraries.lightbox.img-lightbox 
                        class="mx-auto rounded-xl"
                        class_w_h="h-32 w-32"
                        name="{{ $this->company->allPictures->where('type', 'image_logo')->first()->path_jpg }}"   
                    />
                  </div>
                  @endif

                  @if ($this->company->allPictures->where('type', 'image_qr')->first())
                  <div class="grid text-center gap-1">
                    <p class="text-sm italic">QR</p>
                    <x-pages.libraries.lightbox.img-lightbox 
                        class="mx-auto rounded-xl"
                        class_w_h="h-32 w-32"
                        name="{{ $this->company->allPictures->where('type', 'image_qr')->first()->path_jpg }}"   
                    />
                  </div>
                  @endif
                      
                  </div>
    
                  <x-pages.forms.validation-errors class="mb-4" />
                </x-slot>
        
                <x-slot name="actions">
                    <x-pages.buttons.primary-link 
                    title="Volver" 
                    href="{{ route('companies.index') }}"
                    >
                    
                    @slot('icon')
                        {{-- <x-pages.icons.for-icons-app icon="plus" class="w-6 h-6"/> --}}
                    @endslot
            
                    </x-pages.buttons.primary-link>
        
                </x-slot>
        
              </x-pages.forms.jetstream.form-section>
</div>
