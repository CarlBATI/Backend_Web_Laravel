<div>
    <h2>{{ $category->name }}</h2>
    @foreach ($category->faqPairs as $pair)
        <h3>{{ $pair->question }}</h3>
        <p>{{ $pair->answer }}</p>
    @endforeach
</div>