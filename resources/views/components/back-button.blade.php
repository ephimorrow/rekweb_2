@props([
    'url' => null,
    'text' => 'Kembali',
    'icon' => 'fas fa-arrow-left',
    'size' => 'normal', // sm, normal, lg
    'class' => ''
])

@php
    $sizeClasses = [
        'sm' => 'btn-back-sm',
        'normal' => '',
        'lg' => 'btn-back-lg'
    ];
    
    $sizeClass = $sizeClasses[$size] ?? '';
@endphp

@if($url)
    <a href="{{ $url }}" class="btn-back {{ $sizeClass }} {{ $class }}" title="{{ $text }}">
        <i class="{{ $icon }}"></i>
        <span class="d-none d-sm-inline">{{ $text }}</span>
    </a>
@else
    <button type="button" onclick="window.history.back()" class="btn-back {{ $sizeClass }} {{ $class }}" title="{{ $text }}">
        <i class="{{ $icon }}"></i>
        <span class="d-none d-sm-inline">{{ $text }}</span>
    </button>
@endif