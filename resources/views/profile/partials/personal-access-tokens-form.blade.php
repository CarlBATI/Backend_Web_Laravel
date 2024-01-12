<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Manage Personal Access Tokens') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Create and revoke tokens that allow you to access our API.') }}
        </p>
    </header>

    <form method="post" action="{{ route('tokens.store') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="token_name" :value="__('Token Name')" />

            {{--<x-input id="token_name" class="block mt-1 w-full" type="text" name="name" required autofocus />--}}
        </div>

        <div class="flex items-center justify-end mt-4">
            {{--<x-button>--}}
                {{ __('Create') }}
            {{--</x-button>--}}
        </div>
    </form>
</section>