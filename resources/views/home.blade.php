<x-guest-layout>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Leaderboard') }}
            </h2>
        </div>
    </header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">Leader board</div>
                    
                    <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="w-full text-center">
                            <thead class="border-b bg-gray-800">
                                <tr class="">
                                    <th scope="col" class="px-6 py-4 text-xs font-medium text-white uppercase">ID</th>
                                    <th scope="col" class="px-6 py-4 text-xs font-medium text-white uppercase">Player</th>
                                    <th scope="col" class="px-6 py-4 text-xs font-medium text-white uppercase">No of Win</th>
                                </tr>
                                </thead class="border-b">
                            <tbody>
                                @foreach($leader_ranks as $key=>$rank)
                                <tr class="bg-white border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $key+1 }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <a href="{{ route('player.show', $rank->id) }}" class="">{{ $rank->name }}</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            Win : {{ $rank->win_count }}
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
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row font-medium bg-gray-300">Lowest Move</div>
                    <div>
                        <p>Game date: {{ $lowest_move_game->date }}</p>
                        <p>Number of Moves: {{ $lowest_move_game->moves }}</p>
                        <p>
                            Won : <a href="{{ route('player.show', $lowest_move_win->id) }}">{{ $lowest_move_win->name }}</a>
                            Lost: <a href="{{ route('player.show', $lowest_move_loss->id) }}">{{ $lowest_move_loss->name }}</a>
                        </p>
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row font-medium bg-gray-300">Heighest Move</div>
                    <div>
                        <p>Game date: {{ $heighest_move_game->date }}</p>
                        <p>Number of Moves: {{ $heighest_move_game->moves }}</p>
                        <p>
                            Won : <a href="{{ route('player.show', $heighest_move_win->id) }}">{{ $heighest_move_win->name }}</a>
                            Lost: <a href="{{ route('player.show', $heighest_move_loss->id) }}">{{ $heighest_move_loss->name }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
