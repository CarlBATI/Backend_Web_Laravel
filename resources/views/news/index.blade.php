<x-app-layout :showNavigation="true">
    <div x-data="{ selectedNewsItem: null }" @click="selectedNewsItem = null">
        <template x-if="selectedNewsItem">
            <x-admin-bar>
                <x-admin-bar-button id="viewButton" color="green">View</x-admin-bar-button>
                <x-admin-bar-button id="editButton" color="yellow">
                    <a x-bind:href="'/news/edit/' + selectedNewsItem">Edit</a>
                </x-admin-bar-button>
            </x-admin-bar>
        </template>
            <x-admin-bar-button id="deleteButton" color="red" @click="deleteNewsItem">
                    
                </x-admin-bar-button>
        <template x-if="!selectedNewsItem">
            <x-admin-bar>
                <x-admin-bar-button id="newButton" color="blue">New</x-admin-bar-button>
                <span class="text-sm italic text-slate-800">{{__('Click on a news item to see more options')}}</span>
            </x-admin-bar>
        </template>
            <form action="{{route('news.destroy', $newsItem)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
            </form>
        <div class="flex flex-wrap max-w-fit place-content-center">
            @forelse ($news as $newsItem)
                <div @click.stop="selectedNewsItem = {{ $newsItem->id }}; console.log('selectedNewsItem: ' + selectedNewsItem)"
                class="shadow-md border border-slate-100 rounded-md m-5 p-5 w-80 h-72 overflow-hidden">
                    <h3 class="text-lg font-semibold text-slate-900 rounded-md pb-2">{{ $newsItem->title }}</h3>
                    <span class="text-slate-700 overflow-hidden">{{ $newsItem->content }}</span>
                </div>
            @empty
                <p class="text-center text-gray-500 text-xl font-semibold">No news items are currently available. Please check back later.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>