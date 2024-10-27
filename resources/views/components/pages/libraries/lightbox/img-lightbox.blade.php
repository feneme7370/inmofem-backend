@props(['name' => '', 'tumb' => '', 'class_w_h' => 'w-full h-full', 'class' => '', 'temporary' => false])


    @if ($temporary)
        @if($name && !$name == '' && !$name == null)
            <a href="{{asset($name)}}" data-lightbox="{{$name}}">
                <img src="{{asset($name)}}" alt="imagen portada" class="{{ $class_w_h }} {{ $class }}  object-cover rounded-sm"/>
            </a>
        @endif
    @else

        @if($name && !$name == '' && !$name == null && file_exists( $name ))
                <a href="{{asset($name)}}" data-lightbox="{{$name}}">
                    <img src="{{asset( $tumb ? $tumb : $name )}}" alt="imagen portada" class="{{ $class_w_h }} {{ $class }}  object-cover rounded-sm"/>
                </a>
        @endif

    @endif

    

    @push('lightbox')
        <script>
            lightbox.option({
            'alwaysShowNavOnTouchDevices': true,
            'showImageNumberLabel': true,
            'imageFadeDuration': 100,
            'resizeDuration': 100,
            'fadeDuration': 100,
            'disableScrolling': true,
            'wrapAround': true,
            
            })
        </script>
    @endpush



