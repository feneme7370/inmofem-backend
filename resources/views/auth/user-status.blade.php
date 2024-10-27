<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <p class="text-center text-3xl">
                <span class="font-bold">Inmo</span>Fem
            </p>
        </div>
    
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="mb-4 text-lg text-gray-800">
                <p>El usuario o la empresa estan inhabilitados, cierre sesion e inicie con otra cuenta</p>
    

                <p class="italic text-base text-gray-800 mt-10 font-bold">{{ $message ?? '' }}</p>
                
                <p class="italic text-sm text-gray-600 mt-10">Si no es su sitacion, comunicarse con Femaser</p>
            </div>
    
            <div class="mt-4 flex items-center justify-end">
    
                <div>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
    
                        <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ms-2">
                            {{ __('Cerrar sesion') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
