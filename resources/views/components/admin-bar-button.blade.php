{{-- See app/View/Components/AdminBarButton.php for Documentation --}}
@php
    $colorClasses = [
        'red' => 'border-red-600 bg-red-400 hover:bg-red-600',
        'blue' => 'border-blue-600 bg-blue-400 hover:bg-blue-600',
        'green' => 'border-green-600 bg-green-400 hover:bg-green-600',
        'yellow' => 'border-yellow-600 bg-yellow-400 hover:bg-yellow-600',
        'indigo' => 'border-indigo-600 bg-indigo-400 hover:bg-indigo-600',
    ];
    $classes = $colorClasses[$color] ?? $colorClasses['blue']; // Default to 'blue' if the color is not found
@endphp
<button id="{{ $id }}" class="{{ $classes }} text-slate-50 hover:text-white font-bold py-1 px-2 rounded ml-2">
    {{ $slot }}
</button>