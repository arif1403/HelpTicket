<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <h1 class="text-white text-lg font-blod">
            Support Ticket
        </h1>
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto w-full border-collapse border border-gray-300 dark:border-gray-700">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-700">
                                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-left">No.</th>
                                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-left">Title</th>
                                <th class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-left">Created At</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $ticket)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">
                                    <a href="{{route('$ticket.show', $ticket->id)}}">{{ $ticket->title }}</a>
                                </td>
                                <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $ticket->created_at->diffForHumans() }}</td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>