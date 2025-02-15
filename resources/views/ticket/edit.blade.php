<x-app-layout>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <h1 class="text-white text-lg font-blod">
            Update Support Ticket
        </h1>
        <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form action="{{ route('ticket.update', $ticket->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mt-6">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" autofocus
                        value="{{ $ticket->title }}" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
                <div class="mt-6">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-textarea name="description" id="description" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <div class="mt-6">
                    @if($ticket->attachment)
                    <a href="{{ asset('storage/'.$ticket->attachment) }}" class="text-blue-500 underline" target="_blank">View Attachment</a>
                    @endif
                    <x-input-label for="attachment" :value="__('Attachment (if any)')" />
                    <x-file-input type="file" name="attachment" id="attachment" />
                    <x-input-error :messages="$errors->get('attachment')" class="mt-2" />
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-3">
                        Submit Bruhh!
                    </x-primary-button>
                    <x-secondary-button>
                        <a href="{{ route('ticket.index') }}">Cencel Bruhh!</a>
                    </x-secondary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>