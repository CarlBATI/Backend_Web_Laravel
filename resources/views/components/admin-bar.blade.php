<div {{ $attributes->merge(['class' => 'shadow-md border-t border-b border-slate-400 p-2']) }}>
    <span class="text-slate-800 font-semibold m-2">Admin Actions: </span>
    {{ $slot }}
</div>