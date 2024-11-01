<div>
    {{-- mensaje de alerta --}}
    <x-pages.notifications.alerts :messageSuccess="session('messageSuccess')"
        :messageError="session('messageError')" 
    />

    {{-- breadcrum, title y button --}}
        <x-pages.breadcrums.breadcrum 
            title_1="Inicio"
            link_1="{{ route('dashboard.index') }}"
            title_2="Propiedades"
            link_2="{{ route('properties.index') }}"
            />

        <x-pages.menus.title-and-btn>

            @slot('title')
            <x-pages.titles.title-pages title="Propiedades"/>
            @endslot

            @slot('button')
                <x-pages.buttons.primary-link 
                title="Agregar" 
                href="{{ route('properties.create') }}"
                >
                
                @slot('icon')
                    <x-pages.icons.for-icons-app icon="plus" class="w-6 h-6"/>
                @endslot

                </x-pages.buttons.primary-link>
            @endslot

        </x-pages.menus.title-and-btn>
    {{-- end breadcrum, title y button --}}


    {{-- filters --}}
        <div class="flex justify-between items-center gap-1">

            <div class="w-full">
            <x-pages.forms.input-form 
            wire:model.live.debounce.600ms="search" 
            placeholder="Buscar" 
            />
            </div>

            <div class="">
                {{-- select pages --}}
                <div>

                    <button id="dropdownRadioPerPageButton" data-dropdown-toggle="dropdownRadioPerPage"
                        class="text-white bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-xs px-5 py-2.5 flex text-center items-center dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-amber-800 w-full"
                        type=""><span class="truncate">Ver | {{ $perPage }}</span><svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    
                    <!-- Dropdown menu -->
                    <div id="dropdownRadioPerPage"
                        class="z-50 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioPerPageButton">
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="default-radio-per-page-0" type="radio" value="10" selected wire:model.live="perPage"
                                        class="w-4 h-4 text-amber-600 bg-gray-100 border-gray-300 focus:ring-amber-500 dark:focus:ring-amber-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="default-radio-per-page-0"
                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">10</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="default-radio-per-page-1" type="radio" value="20" wire:model.live="perPage"
                                        class="w-4 h-4 text-amber-600 bg-gray-100 border-gray-300 focus:ring-amber-500 dark:focus:ring-amber-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="default-radio-per-page-1"
                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">20</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="default-radio-per-page-2" type="radio" value="50" wire:model.live="perPage"
                                        class="w-4 h-4 text-amber-600 bg-gray-100 border-gray-300 focus:ring-amber-500 dark:focus:ring-amber-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="default-radio-per-page-2"
                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">50</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="default-radio-per-page-3" type="radio" value="100" wire:model.live="perPage"
                                        class="w-4 h-4 text-amber-600 bg-gray-100 border-gray-300 focus:ring-amber-500 dark:focus:ring-amber-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="default-radio-per-page-3"
                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">100</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="flex item justify-center gap-1">
            {{-- select property types --}}
            <div>
    
                <button id="dropdownRadioPropertyTypesButton" data-dropdown-toggle="dropdownRadioPropertyTypes"
                    class="text-white bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-xs px-5 py-2.5 text-center flex items-center dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-amber-800"
                    type="button">Tipos | {{ $property_type_name }}<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                
                <!-- Dropdown menu -->
                <div id="dropdownRadioPropertyTypes"
                    class="z-50 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioPropertyTypesButton">
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input id="default-radio-property-type-0" type="radio" value="" wire:model.live="property_type"
                                    class="w-4 h-4 text-amber-600 bg-gray-100 border-gray-300 focus:ring-amber-500 dark:focus:ring-amber-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="default-radio-property-type-0"
                                    class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">- Todos -</label>
                            </div>
                        </li>
                        @foreach ($property_types as $item)
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input id="{{ 'default-radio-property-type-'.$item->id }}" type="radio" value="{{ $item->id }}"
                                    wire:model.live="property_type"
                                    class="w-4 h-4 text-amber-600 bg-gray-100 border-gray-300 focus:ring-amber-500 dark:focus:ring-amber-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="{{ 'default-radio-property-type-'.$item->id }}"
                                    class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $item->name
                                    }}</label>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
    
            {{-- select method --}}
            <div>
    
                <button id="dropdownMethodsButton" data-dropdown-toggle="dropdownMethods"
                    class="text-white bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-xs px-5 py-2.5 text-center flex items-center dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-amber-800"
                    type="button">Metodo | {{ $method_name }}<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                
                <!-- Dropdown menu -->
                <div id="dropdownMethods"
                    class="z-50 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMethodsButton">
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input id="default-radio-method-0" type="radio" value="" wire:model.live="method"
                                    class="w-4 h-4 text-amber-600 bg-gray-100 border-gray-300 focus:ring-amber-500 dark:focus:ring-amber-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="default-radio-method-0"
                                    class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">- Todos -</label>
                            </div>
                        </li>
                        @foreach ($methods as $item)
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input id="{{ 'default-radio-method-'.$item->id }}" type="radio" value="{{ $item->id }}"
                                    wire:model.live="method"
                                    class="w-4 h-4 text-amber-600 bg-gray-100 border-gray-300 focus:ring-amber-500 dark:focus:ring-amber-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="{{ 'default-radio-method-'.$item->id }}"
                                    class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $item->name
                                    }}</label>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
                            

        <x-pages.menus.checkboxs-group 
            placeholder_box_1="Activos"
            property_box_1="active"
        />


    {{-- end filters --}}

    {{-- logo de carga --}}
      <x-pages.spinners.loading-spinner wire:loading.delay />
    {{-- end logo de carga --}}

    {{-- table --}}
        
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
            <table class="t_table">
                <thead>
                <tr>
                    <th wire:click="orderTable('id')">{{ $sortBy === 'id' ? ($sortAsc === true ? '↑' : '↓') : '' }} ID</th>
                    <th wire:click="orderTable('title')">{{ $sortBy === 'title' ? ($sortAsc === true ? '↑' : '↓') : '' }} Acciones</th>
                    <th wire:click="orderTable('title')">{{ $sortBy === 'title' ? ($sortAsc === true ? '↑' : '↓') : '' }} Imagen</th>
                    <th wire:click="orderTable('title')">{{ $sortBy === 'title' ? ($sortAsc === true ? '↑' : '↓') : '' }} Nombre</th>
                    <th wire:click="orderTable('price')">{{ $sortBy === 'price' ? ($sortAsc === true ? '↑' : '↓') : '' }} Precio</th>
                    <th wire:click="orderTable('title')">{{ $sortBy === 'title' ? ($sortAsc === true ? '↑' : '↓') : '' }} Serv.</th>
                    <th wire:click="orderTable('is_send')">{{ $sortBy === 'is_send' ? ($sortAsc === true ? '↑' : '↓') : '' }} Public.</th>
                    <th wire:click="orderTable('status')">{{ $sortBy === 'status' ? ($sortAsc === true ? '↑' : '↓') : '' }} Estado</th>
                </tr>
                </thead>
                <tbody>
    
                @foreach ($properties as $item)
                <tr class="{{ $item->status === 1 ? '' : 'bg-red-200' }}">
    
                    <td class="with-id-columns">
                        <p>{{ ($properties->currentPage() - 1) * $properties->perPage() + $loop->iteration }}</p>
                    </td>

                    <td class="with-actions-columns">
                        <div class="actions">
                            {{-- <x-pages.buttons.view-link href="{{ route('properties.show', ['propertyId' => $item->uuid]) }}" /> --}}
                            <x-pages.buttons.edit-link href="{{ route('properties.create', ['propertyId' => $item->uuid]) }}" />
                            <x-pages.buttons.delete-text wire:click="deleteModal( '{{ $item->uuid }}' )" />
                        </div>
                    </td>
    
                    <td>
                        <x-pages.libraries.lightbox.img-lightbox 
                            class="mx-auto rounded-xl"
                            class_w_h="h-16 w-16"
                            name="{{ $item->allPictures->where('type', 'image_cover')->first()->path_jpg ?? ''}}"   
                        />
                    </td>
    
                    <td>
                        <p class="text-start font-bold">
                            <a class="hover:underline cursor-pointer" href="{{ route('properties.show', ['propertyId' => $item->uuid]) }}"> {{$item->title}} </a>
                        </p>
                        <p class=" text-start">
                            <a class="hover:underline cursor-pointer text-xs" href="{{ route('properties.index', ['m' => $item->method->id]) }}"> {{$item->method->name}}</a> |  
                            <a class="hover:underline cursor-pointer text-xs" href="{{ route('properties.index', ['pt' => $item->property_type->id]) }}"> {{$item->property_type->name}} </a> 
                        </p>
                    </td>

                    <td>
                        <p>{{ $item->money->signo }} {{ number_format($item->price, 2,",",".") }}</p>
                    </td>

                    <td>
                        <p class="text-xs">{{ $item->features->count()}}</p>
                    </td>
    
                    <td class="with-status-columns">
                        <span
                            wire:click="isSend('{{ $item->uuid }}')"
                            class="line-clamp-2 cursor-pointer {{$item->is_send === 1 ? 't_badge-blue' : 't_badge-gray'}}">
                            {{$item->is_send ? 'Vendida' : 'Publicada'}}
                        </span>
                    </td>
    
                    <td class="with-status-columns">
                        <span
                            wire:click="isStatus('{{ $item->uuid }}')"
                            class="line-clamp-2 cursor-pointer {{$item->status === 1 ? 't_badge-green' : 't_badge-red'}}">
                            {{$item->status === 1 ? 'Activo' : 'Inactivo'}}
                        </span>
                    </td>
    
                </tr>
                @endforeach
    
                </tbody>
            </table>
            </div>
        </div>

    {{-- end table --}}

    {{-- Paginacion --}}
        <div class="mt-2 ">{{ $properties->onEachSide(1)->links() }}</div>
    {{-- end Paginacion --}}

    <x-pages.modals.jetstream.dialog-modal wire:model="deleteActionModal">
        <x-slot name="title">
            {{ __('Eliminar de forma permanente?') }}
        </x-slot>
      
        <x-slot name="content">
            <p>Desea borrar el registro de forma permanente?</p>
      
        </x-slot>
      
        <x-slot name="footer">
            <x-pages.buttons.normal-btn wire:click="$set('deleteActionModal', false)" title="Cancelar" />
            <x-pages.buttons.primary-btn 
                autofocus
                wire:click="delete"
                title="Borrar">
            </x-pages.buttons.primary-btn>
        </x-slot>
      </x-pages.modals.jetstream.dialog-modal>

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
