<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-50">
                <tr class="columns-3">
                    <th scope="col" class="px-12 py-4 font-medium text-gray-900">Title</th>
                    <th scope="col" class="px-10 py-4 font-medium text-gray-900">State</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Description</th>
                    <th scope="col" class="px-10 py-4 font-medium text-gray-900">Actions</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @foreach($events as $event)
                <tr class="hover:bg-gray-50">
                    <th class="flex gap-3 px-4 py-4 font-normal text-gray-900 mx-4">
                        <div class="relative h-10 w-10">
                            <img class="h-full w-full rounded-full object-cover object-center" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                            <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                        </div>
                        <div class="text-sm px-3">
                            <div class="font-medium text-gray-700">{{$event->event_title}}</div>
                            <div class="text-gray-400">{{$event->events_access}}</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                            <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                            Pending
                        </span>
                    </td>
                    <td class="px-6 py-4">{{$event->description}}</td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            <form action="{{ route('admin.accept', ['event' => $event->id]) }}" method="post">
                                @csrf
                                @method('PATCH')

                                <button type="submit">
                                    <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                                        Accept
                                    </span>
                                </button>
                            </form>

                            <form action="{{ route('admin.deny', ['event' => $event->id]) }}" method="post">
                                @csrf
                                @method('PATCH')

                                <button type="submit">
                                    <span class="inline-flex items-center gap-1 rounded-full bg-violet-50 px-2 py-1 text-xs font-semibold text-violet-600">
                                        Deny
                                    </span>
                                </button>
                            </form>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-end gap-4">

                        </div>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</x-app-layout>