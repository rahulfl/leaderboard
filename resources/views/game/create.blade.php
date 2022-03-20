<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Game') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <form method="post" enctype="multipart/form-data" action="{{ route('game.store') }}">
                                    @csrf
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <label for="name" class="block font-medium text-sm text-gray-700">{{ __('Date') }}</label>                            
                                        <input
                                            x-data={date:null}
                                            x-ref="input"
                                            x-init="new Pikaday({ field: $refs.input })"
                                            type="text"
                                            x-model="date"
                                            name="date"
                                            placeholder="Select game date"
                                            value="old('date')"
                                        >
                                        @error('date')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="px-4 py-5 bg-white sm:p-6 flex items-center">
                                        <div class="sm:p-6">
                                            <label for="player1_id" class="block font-medium text-sm text-gray-700">{{ __('Player 1') }}</label>
                                            <select class="form-select validations" id="player1_id" name="player1_id">
                                                <option selected="" disabled="">{{ __('Select Player 1') }}</option>                                
                                                @foreach($players as $player)
                                                    <option value="{{ $player->id }}" @selected(old('player1_id') == $player->id)>{{ $player->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('player1_id')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="sm:p-6">
                                        <label for="player1_color" class="block font-medium text-sm text-gray-700">{{ __('Player 1 color') }}</label>
                                            <select class="form-select validations" id="player1_color" name="player1_color">
                                                <option selected="" disabled="">{{ __('Select Player 1 Color') }}</option>                                
                                                <option value="{{ 'black' }}" @selected(old('player1_color') == 'black')>{{ __('Black') }}</option>
                                                <option value="{{ 'white' }}" @selected(old('player1_color') == 'white')>{{ __('White') }}</option>                                    
                                            </select>
                                            @error('player1_color')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="px-4 py-5 bg-white sm:p-6 flex items-center">
                                        <div>
                                            <label for="player2_id" class="block font-medium text-sm text-gray-700">{{ __('Player 2') }}</label>
                                            <select class="form-select validations" id="player2_id" name="player2_id">
                                                <option selected="" disabled="">{{ __('Select Player 2') }}</option>                                
                                                @foreach($players as $player)
                                                    <option value="{{ $player->id }}" @selected(old('player2_id') == $player->id)>{{ $player->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('player2_id')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                        <label for="player2_color" class="block font-medium text-sm text-gray-700">{{ __('Player 2 color') }}</label>
                                            <select class="form-select validations" id="player2_color" name="player2_color">
                                                <option selected="" disabled="">{{ __('Select Player 2 Color') }}</option>                                
                                                <option value="{{ 'black' }}" @selected(old('player2_color') == 'black')>{{ __('Black') }}</option>
                                                <option value="{{ 'white' }}" @selected(old('player2_color') == 'white')>{{ __('White') }}</option>                                    
                                            </select>
                                            @error('player1_color')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                    <p>Win/Draw:</p>
                                        <input type="radio" id="win" name="win" value="1" {{  old('win') == 1 ? 'checked' : '' }}>
                                        <label for="win">{{ __('Win') }}</label>
                                        <input type="radio" id="draw" name="win" value="0" {{  old('win') == 0 ? 'checked' : '' }}>
                                        <label for="draw">{{ __('Draw') }}</label>
                                    </div>
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <label for="winner_player_id" class="block font-medium text-sm text-gray-700">{{ __('Winner') }}</label>
                                        <select class="form-select validations" id="winner_player_id" name="winner_player_id">
                                            <option selected="" disabled="">{{ __('Select Winner') }}</option>                                
                                            <option value="player1 "@selected(old('winner_player_id') == 'player1')>{{ __('Player 1') }}</option>                                
                                            <option value="player2" @selected(old('winner_player_id') == 'player2')>{{ __('Player 2') }}</option>                         
                                        </select>
                                        @error('winner_player_id')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <label for="name" class="block font-medium text-sm text-gray-700">{{ __('Moves') }}</label>
                                        <input type="text" name="moves" id="moves" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                            value="{{ old('moves') }}" />
                                        @error('moves')
                                            <p class="text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <a href="{{ route('game.index') }}" class="px-3 py-5 bg-gray-800 text-white sm:rounded-lg capitalize">Back</a>
                                        <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                            {{ __('Create') }}
                                        </button>
                                    </div>
                                </form>    
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
</x-app-layout>