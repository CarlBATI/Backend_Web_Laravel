<x-app-layout :showNavigation="true">
    @foreach ($faqCategories as $category)
        <x-faq-category :category="$category" />
    @endforeach
</x-app-layout>