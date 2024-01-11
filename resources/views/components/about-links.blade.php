@foreach($categories as $category)
    <!-- ucfirst capilatizes the first letter of the string -->
    <h2 class="text-slate-800 text-2xl my-5">{{ ucfirst($category->name) }}</h2>
    @foreach($category->links as $link)
        <p class="text-slate-950 my-4">
            <a href="{{ $link->url }}">{{ $link->text }}</a>
        </p>
    @endforeach
@endforeach