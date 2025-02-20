<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <h1 class="text-white text-lg font-blod">
            {{ $ticket->title }}
        </h1>
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto w-full border-collapse border border-gray-300 dark:border-gray-700">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-700">
                        
                                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-left">Description</th>
                                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-left">Attachment</th>
                                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-left">Status</th>
                                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-left">Created At</th>
                                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                              
                                <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $ticket->description }}</td>
                                <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">
                                    @if($ticket->attachment)
                                    <a href="{{ asset('storage/'.$ticket->attachment) }}" class="text-blue-500 underline" target="_blank">View</a>
                                    @else
                                    No Attachment
                                    @endif
                                </td>
                                <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $ticket->status }}</td>
                                <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $ticket->created_at->diffForHumans() }}</td>
                                <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">
                                    <div class="flex justify-between">
                                        <x-primary-button>
                                            <a href="{{ route('ticket.edit', $ticket->id) }}">Edit</a>
                                        </x-primary-button>
                                        <form class="ml-4" action="{{ route('ticket.destroy', $ticket->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button>
                                                Delete
                                            </x-danger-button>
                                        </form>
                                        @if(auth()->user()->isAdmin)
                                        <!-- Status Action -->
                                        <x-primary-button class="ml-4 bg-green">
                                            <a href="#">Approve</a>
                                        </x-primary-button>
                                        <x-primary-button class="ml-4 bg-yellow">
                                            <a href="#">Reject</a>
                                        </x-primary-button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>