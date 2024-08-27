<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add new task') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Create a new task') }}
        </p>
    </header>

    <form method="post" action="{{ route('tasks.store') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" autocomplete="description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="status" :value="__('Status')" />
            <select id="status" name="status" class="mt-1 block w-full" autocomplete="new-password" >

                <option value="pending">pending</option>
                <option value="completed">completed</option>

            </select>
            <x-input-error :messages="$errors->get('status')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
