@foreach($categories as $category)
    <h2>{{ $category->name }}</h2>
    <ul>
        @foreach($category->links as $link)
            <li><a href="{{ $link->url }}">{{ $link->text }}</a></li>
        @endforeach
    </ul>
@endforeac:categories="$categories" h