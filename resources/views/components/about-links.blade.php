@foreach($categories as $category)
    <!-- ucfirst capilatizes the first letter of the string -->
    <h2 class="text-slate-800 text-2xl my-5">{{ ucfirst($category->name) }}</h2>
    <hr class="mx-auto w-1/2">
    @foreach($category->links as $link)
        <p class="text-slate-950 my-4 hover:text-slate-500">
            <a href="{{ $link->url }}"
            class="relative inline-block hover:underline decoration-slate-600 decoration-1 underline-offset-4" 
            >
                {{ $link->text }}
            </a>
        </p>
    @endforeach
@endforeach