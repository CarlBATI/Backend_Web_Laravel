<div class="max-w-2xl mx-auto my-6 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <h1 id='title' class="text-4xl font-extrabold tracking-tight text-gray-900 rounded border-slate-600 w-full">{{ $newsItem->title }}</h1>
        <p id='publishing_date' class="mt-1 text-sm text-gray-500 rounded border-slate-600">{{ date('Y-m-d\TH:i:s', strtotime($newsItem->publishing_date)) }}</p>
        <div class="mt-4 prose prose-green text-gray-500 mx-auto">
            <img class="h-48 w-full object-cover" src="{{ $newsItem->image }}" alt="">
            <p id='content' class="rounded border-slate-600">{{ $newsItem->content }}</p>
        </div>
</div>