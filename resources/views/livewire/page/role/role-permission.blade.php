<div>
    {{-- breadcrum, title y button --}}
    <x-pages.breadcrums.breadcrum 
    title_1="Inicio"
    link_1="{{ route('dashboard.index') }}"
    title_2="Roles"
    link_2="{{ route('roles.index') }}"
    title_2="Permisos"
    link_2="{{ route('roles.permission') }}"
    />

<x-pages.menus.title-and-btn>

    @slot('title')
    <x-pages.titles.title-pages title="Permisos"/>
    @endslot

    @slot('button')
        <x-pages.buttons.primary-link 
        title="Agregar" 
        wire:click="createActionModal"
        
        >
        
        @slot('icon')
            {{-- <x-pages.icons.for-icons-app icon="plus" class="w-6 h-6"/> --}}
        @endslot

        </x-pages.buttons.primary-link>
    @endslot

</x-pages.menus.title-and-btn>
{{-- end breadcrum, title y button --}}

{{-- logo de carga --}}
<x-pages.spinners.loading-spinner wire:loading.delay />
{{-- end logo de carga --}}

  
{{-- table --}}
        
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
        <table class="t_table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Acciones</th>
                <th>Nombre</th>
                <th>GuardName</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($permissions as $item)
            <tr class="{{ $item->status === 1 ? '' : 'bg-red-200' }}">

                <td class="with-id-columns">
                <p>{{ ($permissions->currentPage() - 1) * $permissions->perPage() + $loop->iteration }}</p>
                </td>

                <td class="with-actions-columns">
                <div class="actions">
                    <x-pages.buttons.edit-link  wire:click="editActionModal({{$item->id}})" />
                    <x-pages.buttons.delete-text  wire:click="$dispatch('deletePermission', {{$item->id}})" />
                </div>
                </td>

                <td>
                <p><a class="hover:underline" href=""> {{$item->name}} </a> </p>

                <td>
                <p><a class="hover:underline" href=""> {{$item->guard_name}} </a> </p>
                </td>

            </tr>
            @endforeach

            </tbody>
        </table>
        </div>
    </div>

{{-- end table --}}

{{-- Paginacion --}}
    <div class="mt-2 ">{{ $permissions->onEachSide(1)->links() }}</div>
{{-- end Paginacion --}}
  
    <!-- Modal para crear y editar -->
    @include('livewire.page.role.permission-form')
  
    @push('scripts')
    <script src="{{ asset('lib/sweetalert2/sweetalert2-delete.js') }}"></script>
    <script>
      Livewire.on('deletePermission', (event, nameDispatch) => {
        sweetalert2Delete(event, 'deletePermissionId')
      });
    </script>
  
    <script src="{{ asset('lib/toastr/toastr-message.js') }}"></script>
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
  