<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Player') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" enctype="multipart/form-data" action="{{ route('player.update', $player->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">{{ __('Name') }}</label>
                            <input type="text" name="name" id="name" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('name', $player->name) }}" />
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="level" class="block font-medium text-sm text-gray-700">{{ __('Level') }}</label>
                            <select class="form-select validations" id="level_id" name="level_id">
                                <option selected="" disabled="">Select Level</option>                                
                                @foreach($levels as $level)
                                    <option value="{{ $level->id }}" @selected(old('level_id', $player->level_id) == $level->id)>{{ $level->name }}</option>
                                @endforeach
                            </select>
                            @error('level_id')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="start_year" class="block font-medium text-sm text-gray-700">{{ __('Start Year') }}</label>
                            <select class="form-select validations" id="start_year" name="start_year">
                                <option selected="" disabled="">Select Year</option>                                
                                @foreach(range(1980, 2022) as $start_year)
                                    <option value="{{ $start_year }}" @selected( old('start_year', $player->start_year) == $start_year)>{{ $start_year }}</option>
                                @endforeach
                            </select>
                            @error('start_year')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="description" class="block font-medium text-sm text-gray-700">{{ __('Description') }}</label>
                            <textarea class="form-control rounded-md shadow-sm mt-1 block w-full validation" name="description" id="description" rows="5">{{ old('description', $player->description) }}</textarea>
                            @error('description')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <a href="{{ route('player.index') }}" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">Back</a>
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Edit') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script type="text/javascript">
var i = 0;
$("#add-btn").click(function(){
++i;
$("#addattribute").append('<div id="input-row"><input type="text" name="attributes['+i+'][label]" id="attributes" type="text" class="form-input rounded-md shadow-sm mt-1  w-half" />'+
 '<input type="text" name="attributes['+i+'][value]" id="attributes" type="text" class="form-input rounded-md shadow-sm mt-1  w-half" />'+
'<button type="buton" class="btn btn-danger remove-row">Remove</button></td><div id="input-row">');
});
$(document).on('click', '.remove-row', function(){  
$(this).parent('div').remove();
});

</script>