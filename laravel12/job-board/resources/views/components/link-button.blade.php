@props(['href' => null])

@php
    $base = 'rounded-md border border-slate-300 bg-white px-2.5 py-1.5 text-center
        text-sm font-semibold text-black shadow small hover:bg-slate-100';
@endphp


@if ($href)
    <a href="{{ $href }}" {{ $attributes->class($base) }}>
        {{ $slot }}
    </a>
@else
    <button disabled {{ $attributes->class($base . ' opacity-50 cursor-not-allowed') }}>
        {{ $slot }}
    </button>
@endif
