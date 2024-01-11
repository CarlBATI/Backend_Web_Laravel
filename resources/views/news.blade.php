<x-app-layout :showNavigation=true>
   <div class="flex flex-wrap max-w-fit place-content-center">
   @foreach ($newsItems as $newsItem)
        <x-news-item :newsItem="$newsItem"/>
    @endforeach
    </div>
</x-app-layout>