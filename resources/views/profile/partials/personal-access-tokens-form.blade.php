<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Manage Personal Access Tokens') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Create and revoke tokens that allow you to access our API.') }}
        </p>
    </header>

    <form method="post" action="{{ route('tokens.create') }}" class="mt-6 space-y-6">
        @csrf
        @method('post')

        @if($tokens->isEmpty())
        <p>No tokens are defined.</p>
        @else
        <ul>
        @foreach($tokens as $token)
            <li class="overflow-auto">
                <span class="text-blue-500 font-bold">{{ $token->name }}</span>
                <span class="ml-2 text-gray-500">{{ $token->token }}</span>
            </li>
        @endforeach
        </ul>
        @endif
        
        <div>
            <x-input-label for="token_name" :value="__('Token Name')" />
            <x-text-input id="token_name" class="block mt-1 w-full" type="text" name="token_name" required autofocus/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button type="submit">
                {{ __('Create Token') }}
            </x-primary-button>
        </div>
    </form>
</section>