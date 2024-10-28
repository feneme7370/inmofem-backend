@php
    $logo_route = route('dashboard.index');
    $logo_path = asset('sistem/img/logo.png');
    $logo_text = 'InmoFem';

    $user_name = auth()->user()->name;
    $user_email = auth()->user()->email;

    $profile_items = [
        'Inicio' => ['route' => route('dashboard.index'), 'name' => 'Inicio', 'icon' => ''],
        'Perfil' => ['route' => route('profile.show'), 'name' => 'Perfil', 'icon' => ''],
    ];

    $sidebar_items = [
        'Inicio' => ['route' => route('dashboard.index'), 'name' => 'Inicio', 'icon' => ''],
        'Perfil' => ['route' => route('profile.show'), 'name' => 'Perfil', 'icon' => ''],
    ];
@endphp

{{-- navbar --}}
<nav class="fixed top-0 z-50 w-full bg-purple-950 border-b border-purple-500">
    <div class="px-3 py-3 sm:px-5 sm:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm bg-primary-300 text-primary-700 rounded-lg sm:hidden hover:bg-primary-200 focus:outline-none focus:ring-2 focus:ring-primary-200 ">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>

                {{-- logo izquierda --}}
                <a href="{{ $logo_route }}" class="flex ms-2 md:me-24">
                    <img src="{{ $logo_path }}" class="h-8 me-3" alt="FlowBite Logo" />
                    <span
                        class="self-center text-gray-100 text-xl font-semibold sm:text-2xl whitespace-nowrap">{{ $logo_text }}</span>
                </a>

            </div>

            <div class="flex items-center">
                <div class="flex items-center ms-3">

                    {{-- imagen en miniatura --}}
                    <div>
                        <button type="button" class="flex text-sm rounded-full focus:ring-4 focus:ring-gray-300 "
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="{{ $logo_path}}" alt="user photo">
                        </button>
                    </div>


                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow "
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-200 mb-1" role="none">
                                {{ $user_name }}
                            </p>
                            <p class="text-sm font-medium text-gray-200 truncate " role="none">
                                {{ $user_email }}
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            @foreach ($profile_items as $profile_item)
                                <li>
                                    <a href="{{ $profile_item['route'] }}"
                                        class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-primary-100   "
                                        >
                                        {{-- <x-sistem.icons.for-icons-app icon="user" /> --}}
                                        {{ $profile_item['name'] }}
                                    </a>
                                </li>
                            @endforeach

                            <li>
                                <form method="POST" action="{{ route('logout') }}"
                                    @csrf
                                    <button class=" flex items-center gap-3 px-4 py-2 text-sm text-gray-700
                                    hover:bg-primary-100 w-full" >
                                    Cerrar sesion
                                    </button>

                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

{{-- sidebar --}}
<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-purple-800 border-r border-purple-500 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto mb-10">

        {{-- listado inicial --}}
        <ul class="space-y-2 font-medium">
                @can('dashboard.index')
                <li>
                    <a 
                        href="{{ route('dashboard.index') }}"    
                        class="{{ request()->routeIs('dashboard.index') ? 'bg-gray-950' : '' }} 
                        flex items-center p-2 text-gray-200 rounded-lg dark:text-white  hover:bg-gray-700 dark:hover:bg-gray-700 group"
                    >

                    <x-pages.icons.for-icons-app icon="dashboard" class_w_h="w-6 h-6"/>
    
                    <span class="ms-3">Inicio</span>
                    </a>
                </li>
                @endcan

                <li>
                    <a 
                        href="{{ route('profile.show') }}"    
                        class="{{ request()->routeIs('profile.show') ? 'bg-gray-950' : '' }} 
                        flex items-center p-2 text-gray-200 rounded-lg dark:text-white  hover:bg-gray-700 dark:hover:bg-gray-700 group"
                    >

                    <svg class="w-5 h-5 text-gray-200 transition duration-75 dark:text-gray-400 group-hover:text-gray-200 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                    </svg>
    
                    <span class="ms-3">Perfil</span>
                    </a>
                </li>

                @can('companies.index')
                <li>
                    <a 
                        href="{{ route('companies.index') }}"    
                        class="{{ request()->routeIs('companies.index', 'companies.create', 'companies.show') ? 'bg-gray-950' : '' }} 
                        flex items-center p-2 text-gray-200 rounded-lg dark:text-white  hover:bg-gray-700 dark:hover:bg-gray-700 group"
                    >

                    <x-pages.icons.for-icons-app icon="company" class_w_h="w-6 h-6"/>
    
                    <span class="ms-3">Empresa</span>
                    </a>
                </li>
                @endcan

                @can('roles.index')
                <li>
                    <a 
                        href="{{ route('roles.index') }}"    
                        class="{{ request()->routeIs('roles.index') ? 'bg-gray-950' : '' }} 
                        flex items-center p-2 text-gray-200 rounded-lg dark:text-white  hover:bg-gray-700 dark:hover:bg-gray-700 group"
                    >

                    <x-pages.icons.for-icons-app icon="role" class_w_h="w-6 h-6"/>
    
                    <span class="ms-3">Roles</span>
                    </a>
                </li>
                @endcan

                @can('roles.permission')
                <li>
                    <a 
                        href="{{ route('roles.permission') }}"    
                        class="{{ request()->routeIs('roles.permission') ? 'bg-gray-950' : '' }} 
                        flex items-center p-2 text-gray-200 rounded-lg dark:text-white  hover:bg-gray-700 dark:hover:bg-gray-700 group"
                    >

                    <x-pages.icons.for-icons-app icon="permission" class_w_h="w-6 h-6"/>
    
                    <span class="ms-3">Permisos</span>
                    </a>
                </li>
                @endcan

                @can('config.index')
                <li>
                    <a 
                        href="{{ route('config.index') }}"    
                        class="{{ request()->routeIs('config.index') ? 'bg-gray-950' : '' }} 
                        flex items-center p-2 text-gray-200 rounded-lg dark:text-white  hover:bg-gray-700 dark:hover:bg-gray-700 group"
                    >

                    <x-pages.icons.for-icons-app icon="config" class_w_h="w-6 h-6"/>
    
                    <span class="ms-3">Configuracion</span>
                    </a>
                </li>
                @endcan

                @can('properties.index')
                <li>
                    <a 
                        href="{{ route('properties.index') }}"    
                        class="{{ request()->routeIs('properties.index', 'properties.create', 'properties.show') ? 'bg-gray-950' : '' }} 
                        flex items-center p-2 text-gray-200 rounded-lg dark:text-white  hover:bg-gray-700 dark:hover:bg-gray-700 group"
                    >

                    <x-pages.icons.for-icons-app icon="property" class_w_h="w-6 h-6"/>
    
                    <span class="ms-3">Propiedades</span>
                    </a>
                </li>
                @endcan

                </li>


            {{-- listado superadmin --}}


            <li class="border-t border-purple-500"></li>

            {{-- listado cliente --}}




            <!-- Authentication -->
            <li>
                <form method="POST" action="{{ route('logout') }}">
                @csrf
                    <button 
                        type="submit"
                        class="{{ request()->routeIs('logout') ? 'bg-gray-950' : '' }} 
                        flex items-center p-2 text-gray-200 rounded-lg dark:text-white  hover:bg-gray-700 dark:hover:bg-gray-700 group w-full"
                    >

                    <x-pages.icons.for-icons-app icon="logout" class_w_h="w-6 h-6"/>

                    <span class="ms-3">Cerrar sesion</span>
                    </button>
                </form>
            </li>


            <li class="border-t border-purple-500"></li>

        </ul>

    </div>
</aside>