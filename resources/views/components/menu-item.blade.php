@props(['itemurl'])

@php
  $twClass = $attributes->merge([
    'class' => 'text-col-nav-item hover:bg-col-nav-item hover:text-col-header'
    //Se estver na página atual altera a class do item de menu
    .(url()->current() === url($itemurl) ? ' flex font-bold border-b-2' : ' flex')
    //.(Route::has($itemurl) ? ' flex font-bold border-b-2' : ' flex')
    ])
    ->get('class');
@endphp

<div class="{{$twClass}}">
    <a 
     href="{{isset($itemurl) ? $itemurl : "#"}}"
     class="px-4 py-2"
    >
     {{ucwords($slot)}}
    </a>
</div>