<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('About Me') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("This is where you can share a bit about yourself, your interests, hobbies, or anything else you'd like others to know. Feel free to edit and update this section as often as you like.") }}
        </p>
    </header>

    <form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PATCH')

        <div class="my-4">
            <textarea class="lg:w-full" class="rounded" id="about_me" name="about_me" class="form-control" rows="5">{{ old('about_me', $user->about_me) }}</textarea>
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button type="submit">Update</x-primary-button>
        @if (session('status') === 'about-updated')
            <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-600 dark:text-gray-400"
            >{{ __('Saved.') }}</p>
        @endif
        </div>
    </form>
</section>