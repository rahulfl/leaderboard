<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Player List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @auth
            <div class="mx-auto mb-8">
                <a href="{{ route('player.create') }}">{{ __('Add Player') }}</a>
            </div>
            @endauth
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <!-- This example requires Tailwind CSS v2.0+ -->
               <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="w-full text-center">
                        <thead class="border-b bg-gray-800">
                            <tr class="">
                                <th scope="col" class="px-6 py-4 text-xs font-medium text-white uppercase">ID</th>
                                <th scope="col" class="px-6 py-4 text-xs font-medium text-white uppercase">Name</th>
                                <th scope="col" class="px-6 py-4 text-xs font-medium text-white uppercase">Rank</th>
                                <th scope="col" class="px-6 py-4 text-xs font-medium text-white uppercase">Level</th>
                                <th scope="col" class="px-6 py-4 text-xs font-medium text-white uppercase">Start Year</th>
                                <th scope="col" class="relative px-6 py-3"></th>
                            </tr>
                            </thead class="border-b">
                        <tbody>
                            @foreach ($players as $player)
                            <tr class="bg-white border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $player->id }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $player->name }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $player->rank == null ? 'Not Ranked' : $player->rank }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $player->level->name }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $player->start_year }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('player.show', $player->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
                                        @auth
                                        <a href="{{ route('player.edit', $player->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                        <form class="inline-block" action="{{ route('player.destroy', $player->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                                        </form>
                                        @endauth
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>