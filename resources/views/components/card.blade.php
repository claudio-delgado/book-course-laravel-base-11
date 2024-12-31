@props(['type' => 'info'])
<div {{ $attributes->merge(['class' => "w-full border shadow-md rounded-md p-5"])}}>
    
    {{ $slot }}

    <h3>{{$title}}</h3>
    {{ $attributes }}
</div>