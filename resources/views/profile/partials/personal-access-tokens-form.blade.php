<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Manage Personal Access Tokens') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Create and revoke tokens that allow you to access our API.') }}
        </p>
    </header>

    <form method="post" action="{{ route('tokens.store') }}" class="mt-6">
        @csrf
        @method('post')

        @if($tokens->isEmpty())
        <p>No tokens are defined.</p>
        @else
        <form id="delete-tokens-form" method="POST">
        @csrf
        @method('DELETE')
            <ul>
            @foreach($tokens as $token)
            <li class="flex items-center space-x-2 overflow-auto">
                    <input class="delete-checkbox rounded mr-2" type="checkbox" name="tokens[]" value="{{ $token->id }}"/>
                    <span class="text-blue-500 font-bold">{{ $token->name }}</span>
                    <span class="text-gray-500">{{ $token->token }}</span>
                </li>
            @endforeach
            </ul>
            <x-secondary-button type="submit" class="mt-3">
                {{ __('Delete Selected Tokens') }}
            </x-secondary-button>
        </form>
        @endif
        
        <div class="mt-6">
            <x-input-label for="token_name" :value="__('Token Name')" />
            <x-text-input id="token_name" class="block mt-1 w-full" type="text" name="token_name" required autofocus/>
        </div>

        <div class="flex items-center">
            <x-primary-button class="mt-6" type="submit">
                {{ __('Create Token') }}
            </x-primary-button>
        </div>
    </form>
</section>

<script>
document.getElementById('delete-tokens-form').addEventListener('submit', function(event) {
    event.preventDefault();

    document.querySelectorAll('.delete-checkbox:checked').forEach(function(checkbox) {
        fetch('/api/tokens/' + checkbox.value, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }).then(function(response) {
            if (!response.ok) {
                console.log(response);
            }
        });
    });
});
</script>