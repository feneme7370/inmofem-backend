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

            <div class="w-4/5">
            <x-pages.forms.input-form 
            wire:model.live.debounce.600ms="search" 
            placeholder="Buscar" 
            />
            </div>

            <div class="w-1/5">
            <x-pages.forms.select-form wire:model.live="perPage" value_empty="{{ false }}" class="text-center">
                <option value="10"> 10 </option>
                <option value="30"> 30 </option>
                <option value="50"> 50 </option>
                <option value="100"> 100 </option>
            </x-pages.forms.select-form>
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
                            <x-pages.buttons.view-link href="{{ route('properties.show', ['propertyId' => $item->id]) }}" />
                            <x-pages.buttons.edit-link href="{{ route('properties.create', ['propertyId' => $item->id]) }}" />
                            <x-pages.buttons.delete-text wire:click="deleteModal({{ $item->id }})" />
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
                        <p><a class="hover:underline" href=""> {{$item->title}} </a> </p>
                    </td>

                    <td>
                        <p><a class="hover:underline" href=""> {{ $item->money->signo }} {{ number_format($item->price, 2,",",".") }} </a> </p>
                    </td>
    
                    <td class="with-status-columns">
                        <span
                            class="line-clamp-2 {{$item->status === 1 ? 't_badge-green' : 't_badge-red'}}">
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
