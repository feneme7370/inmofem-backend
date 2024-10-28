<x-pages.modals.jetstream.dialog-modal wire:model="showActionModal">
  <x-slot name="title">
      {{ __('Formulario para ' . ($permission ? 'editar' : 'agregar') . ' datos') }}
  </x-slot>

  <x-slot name="content">
      <x-pages.forms.jetstream.form-section submit="save">
        <x-slot name="title">
          {{ __('Datos') }}
        </x-slot>

        <x-slot name="description">
          {{ __('Agregue los permisos a cada ruta que se puede tener acceso.') }}
        </x-slot>

        <x-slot name="form">
          <div class="grid gap-2 w-full">
            <div>
              <x-pages.forms.label-form for="name" value="{{ __('Nombre') }}" />
              <x-pages.forms.input-form id="name" type="text" placeholder="{{ __('Nombre') }}" wire:model="name" />
              <x-pages.forms.input-error for="name" />
            </div>
    
            <div>
              <x-pages.forms.label-form for="guard_name" value="{{ __('Guard Name') }}" />
              <x-pages.forms.input-form id="guard_name" type="text" placeholder="{{ __('Guard Name') }}" wire:model="guard_name" />
              <x-pages.forms.input-error for="guard_name" />
            </div>

          </div>
        </x-slot>

        <x-slot name="actions">
          <x-pages.buttons.normal-link 
          title="Cancelar" 
          wire:click="$set('showActionModal', false)"
          >
          
          @slot('icon')
              {{-- <x-pages.icons.for-icons-app icon="plus" class="w-6 h-6"/> --}}
          @endslot
  
          </x-pages.buttons.normal-link>

          <x-pages.buttons.primary-link 
          title="{{$permission ? 'Actualizar' : 'Guardar'}}"
          wire:click="save"
          >
          
          @slot('icon')
              {{-- <x-pages.icons.for-icons-app icon="plus" class="w-6 h-6"/> --}}
          @endslot
  
          </x-pages.buttons.primary-link>

        </x-slot>

      </x-pages.forms.jetstream.form-section>
  </x-slot>

  <x-slot name="footer">
  </x-slot>
</x-pages.modals.jetstream.dialog-modal>