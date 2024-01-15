<form id="editForm" method="POST" action="{{ route('news.update', $newsItem->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
        <input type="text" name="title" id="titleInput" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $newsItem->title }}">
    </div>
    <div class="mb-4">
        <label for="publishing_date" class="block text-sm font-medium text-gray-700">Publishing Date</label>
        <input type="datetime-local" name="publishing_date" id="publishing_dateInput" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ date('Y-m-d\TH:i:s', strtotime($newsItem->publishing_date)) }}">
    </div>
    <div class="mb-4">
        <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
        <textarea name="content" id="contentInput" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $newsItem->content }}</textarea>
    </div>
    <button type="submit" class="mt-3 btn btn-primary">Save</button>
</form>