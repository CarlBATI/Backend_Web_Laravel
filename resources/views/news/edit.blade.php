<x-app-layout :showNavigation="true">
    <x-admin-bar>
        <div class="flex justify-start">
            <x-admin-bar-button id="newButton" color="gray">New</x-admin-bar-button>
            <x-admin-bar-button id="editButton" color="blue">Edit</x-admin-bar-button>
            <x-admin-bar-button id="saveButton" color="green">Save</x-admin-bar-button>
            <x-admin-bar-button id="deleteButton" color="red">Delete</x-admin-bar-button>
        </div>
            <span id="modeDisplay" class="font-bold text-slate-800 text-2xl border border-dotted p-2 max-w-fit rounded-md border-slate-800 mr-6"></span>
    </x-admin-bar>

    <div class="max-w-2xl mx-auto my-6 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div id="viewMode">
            @include('news.partials.view-mode', ['newsItem' => $newsItem])
        </div>
        <div id="editForm" style="display: none;">
            @include('news.partials.edit-mode-form', ['newsItem' => $newsItem])
        </div>
    </div>
</x-app-layout>