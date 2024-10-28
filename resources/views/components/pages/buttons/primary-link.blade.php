@props(['title' => '', 'icon' => ''])

<a 
    {{ $attributes->merge(['type' => 'button', 'class' => '

    flex items-center justify-center gap-1

    text-white 
    
    bg-purple-700 hover:bg-purple-800 
    focus:ring-4 focus:ring-purple-600 font-medium rounded-lg text-sm px-2 py-1 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800
    cursor-pointer
    ']) }}
    wire:loading.class="opacity-50"
    wire:loading.attr="disabled"
>
    {{$icon}}
    <span>{{ $slot }}{{ $title }}</span>
</a>