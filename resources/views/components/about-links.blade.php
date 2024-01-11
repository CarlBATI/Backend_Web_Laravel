@foreach($categories as $category)
    <h2>{{ $category->name }}</h2>
    @foreach($category->links as $link)
        <p>
            <a href="{{ $link->url }}">{{ $link->text }}</a>
        </p>
    @endforeach
@endforeach