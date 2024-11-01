<div>
    @role('unregister')
    Debe pedir que lo asocien a una empresa
    @endrole

    <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white"">Bienvenido {{ auth()->user()->name }}</h2>

    <section class="grid gap-3 my-2">
        <div>
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Metodos publicados ({{ $properties->count() }})</h5>
            <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800">
                <dl class="grid max-w-screen-xl grid-cols-3 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-4 xl:grid-cols-6 dark:text-white sm:p-8">
                    @foreach ($methods as $method)
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">{{ $properties->where('method_id', $method->id)->count(); }}</dt>
                        <dd class="text-gray-500 dark:text-gray-400"><a class="hover:underline" href="{{ route('properties.index', ['m' => $method->id]) }}">{{ $method->name }}</a></dd>
                    </div>
                    @endforeach
                </dl>
            </div>
        </div>
    
        <div>
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Tipos publicados ({{ $properties->count() }})</h5>
            <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800">
                <dl class="grid max-w-screen-xl grid-cols-3 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-4 xl:grid-cols-6 dark:text-white sm:p-8">
                    @foreach ($property_types as $property_type)
                    <div class="flex flex-col items-center justify-center">
                        <dt class="mb-2 text-3xl font-extrabold">{{ $properties->where('property_type_id', $property_type->id)->count(); }}</dt>
                        <dd class="text-gray-500 dark:text-gray-400"><a class="hover:underline" href="{{ route('properties.index', ['pt' => $property_type->id]) }}">{{ $property_type->name }}</a></dd>
                    </div>
                    @endforeach
                </dl>
            </div>
        </div>
    </section>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
        {{-- ultimas propiedades --}}
        <div
            class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Ultimas propiedades</h5>
                <a href="{{ route('properties.index') }}"
                    class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                    Ver Propiedadres
                </a>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($latest_properties as $property)

                    <li class="py-3 sm:py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full"
                                    src="{{ asset($property->allPictures->where('type', 'image_cover')->first()->path_jpg ?? '') }}"
                                    alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0 ms-4">
                                <a href="{{ route('properties.show', ['propertyId' => $property->uuid]) }}"
                                    class="hover:underline text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{ $property->title }}
                                </a>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ \Carbon\Carbon::parse($property->created_at)->format('d/m/Y') }}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ $property->method->name . ' | ' . $property->property_type->name}}
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                {{ $property->money->signo. ' ' .number_format($property->price, 0,",",".") }}
                            </div>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
        {{-- end ultimas propiedades --}}
        {{-- ultimas propiedades vendidas --}}
        <div
            class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Ultimas ventas</h5>
                <a href="{{ route('properties.index') }}"
                    class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                    Ver Propiedadres
                </a>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($latest_send_properties as $property)

                    <li class="py-3 sm:py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full"
                                    src="{{ asset($property->allPictures->where('type', 'image_cover')->first()->path_jpg ?? '') }}"
                                    alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0 ms-4">
                                <a href="{{ route('properties.show', ['propertyId' => $property->uuid]) }}"
                                    class="hover:underline text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{ $property->title }}
                                </a>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ \Carbon\Carbon::parse($property->send_at)->format('d/m/Y') }}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ $property->method->name . ' | ' . $property->property_type->name}}
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                {{ $property->money->signo. ' ' .number_format($property->price, 0,",",".") }}
                            </div>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
        {{-- end ultimas propiedades vendidas --}}

    </div>





    @push('scripts')


    @endpush
</div>