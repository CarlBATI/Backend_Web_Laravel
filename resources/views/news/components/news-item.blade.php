<div @click="$dispatch('itemClicked', {{ $newsItem->id }})" @selectedNewsItemUpdated.window="console.log('selectedNewsItem: ' + $event.detail)" class="shadow-md border border-slate-100 rounded-md m-5 p-5 w-80 h-72 overflow-hidden">
    <h3 class="text-lg font-semibold text-slate-900 rounded-md pb-2">{{ $newsItem->title }}</h3>
    <span class="text-slate-700 overflow-hidden">{{ $newsItem->content }}</span>
</div>

{{-- <a href="{{ route('news.show', $newsItem->id) }}"></a> --}}