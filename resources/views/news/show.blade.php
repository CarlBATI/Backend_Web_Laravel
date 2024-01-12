<x-app-layout :showNavigation="true">
    <div class="max-w-2xl mx-auto my-6 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <h1 class="text-4xl font-extrabold tracking-tight text-gray-900">{{ $newsItem->title }}</h1>
        <p class="mt-1 text-sm text-gray-500">{{ $newsItem->publishing_date }}</p>
        <div class="mt-4 prose prose-green text-gray-500 mx-auto">
            <img class="h-48 w-full object-cover" src="{{ $newsItem->image }}" alt="">
            <p>{{ $newsItem->content }}</p>
        </div>
    </div>
</x-app-layout>