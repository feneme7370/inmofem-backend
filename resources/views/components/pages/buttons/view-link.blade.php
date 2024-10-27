@props(['title' => ''])

<a {{ $attributes->merge(['class' => '

    flex items-center gap-2 p-1 font-semibold text-xs 

    uppercase tracking-widest
    text-purple-700  fill-purple-700

    hover:text-purple-500 fill-purple-500

    active:text-purple-500 fill-purple-500
    ']) }}
    wire:loading.class="opacity-50"
    wire:loading.attr="disabled"
>
    <div class="flex flex-row gap-1 items-center">
        
        <x-pages.icons.for-icons-app icon="view" class="w-6 h-6"/>
        {{ $title }}{{$slot}}
    </div>
</a>
