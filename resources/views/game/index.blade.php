<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Game List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @auth
            <div class="mx-auto mb-8">
                <a href="{{ route('game.create') }}" class="px-3 py-5 bg-gray-800 text-white sm:rounded-lg capitalize">{{ __('Add Game') }}</a>
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
                                    <th scope="col" class="px-6 py-4 text-xs font-medium text-white uppercase">Date</th>
                                    <th scope="col" class="px-6 py-4 text-xs font-medium text-white uppercase">Players</th>
                                    <th scope="col" class="px-6 py-4 text-xs font-medium text-white uppercase">Winner</th>
                                    <th scope="col" class="px-6 py-4 text-xs font-medium text-white uppercase">Winner Color</th>
                                    <th scope="col" class="px-6 py-4 text-xs font-medium text-white uppercase">Moves</th>
                                    <th scope="col" class="px-6 py-4 text-xs font-medium text-white uppercase"></th>
                                </tr>
                                </thead class="border-b">
                            <tbody>
                                @foreach ($games as $game)
                                <tr class="bg-white border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $game->id }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $game->date }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <a href="{{ route('player.show', $game->players[0]->id) }}" class=""> {{ $game->players[0]->name  }} </a>
                                            VS
                                            <a href="{{ route('player.show', $game->players[1]->id) }}" class=""> {{ $game->players[1]->name  }} </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $game->win == 0 ? 'Draw' : '' }} @if($game->win) <a href="{{ route('player.show', $game->winner_player_id) }}">{{ $game->winnerInfo($game->winner_player_id)->name }} </a>@endif
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            @if($game->win) {{ $game->winnerInfo($game->winner_player_id)->pivot->color }} @endif
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $game->moves }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="#" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
                                            @auth
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                            <form class="inline-block" action="{{ route('game.destroy', $game->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
                            {{ $games->links() }}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>