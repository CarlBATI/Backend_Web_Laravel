<button {{ $attributes->merge(['class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold w-5 h-5 rounded']) }}>
    {{ $slot }}
</button>