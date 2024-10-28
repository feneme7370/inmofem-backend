<x-pages.modals.jetstream.dialog-modal wire:model="showActionModal">
  <x-slot name="title">
      {{ __('Formulario para ' . ($role ? 'editar' : 'agregar') . ' datos') }}
  </x-slot>

  <x-slot name="content">
      <x-pages.forms.jetstream.form-section submit="save">
        <x-slot name="title">
          {{ __('Datos') }}
        </x-slot>

        <x-slot name="description">
          {{ __('Agregar el nombre del rol y poner web en guard name.') }}
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
        </x-slot>

      </x-pages.forms.jetstream.form-section>

      <x-pages.divides.section-border />

      <x-pages.forms.jetstream.form-section submit="save">
        <x-slot name="title">
          {{ __('Permisos') }}
        </x-slot>

        <x-slot name="description">
          {{ __('Seleccione los permisos que el rol va a tener.') }}
        </x-slot>

        <x-slot name="form">
          <div class="grid gap-2 w-full">

            <div>
              <x-pages.forms.label-form value="Permisos"/>
              <div class="grid md:grid-cols-2">
                  @foreach ($permissions as $item)
                  <div class="flex gap-1 items-center">
                      <x-pages.forms.label-form :for="'role_permissions['. $item->id .']'" :value="$item->name">
                      <x-pages.forms.checkbox-form :value="$item->id" wire:model="role_permissions" :id="'role_permissions['. $item->id .']'"/>
                      </x-pages.forms.label-form >
                  </div>
                  @endforeach
              </div>
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
          title="{{$role ? 'Actualizar' : 'Guardar'}}"
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