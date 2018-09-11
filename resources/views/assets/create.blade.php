@extends('layouts.app')

@section('body')
<form method="POST" action="{{ route('assets.store') }}" class="bg-white shadow-md rounded border border-gray-light px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
    {{ csrf_field() }}
    
    <div class="-mx-3 md:flex mt-6">

        <div class="w-1/4 px-3">
            <label class="block uppercase tracking-wide text-blue-dark text-xs font-bold mb-2" for="number">
                Number
            </label>
            <input 
                class="appearance-none block w-full bg-grey-lighter text-blue-dark border border-grey-lighter rounded py-3 px-4" 
                id="number" 
                name="number" 
                type="text" 
                value="{{ old('number') }}">
            
            <p class="text-red">{{ $errors->first('number') }}</p>
        </div>

        <div class="w-1/2 px-3">
            <label class="block uppercase tracking-wide text-blue-dark text-xs font-bold mb-2" for="name">
                Name
            </label>
            <input 
                class="appearance-none block w-full bg-grey-lighter text-blue-dark border border-grey-lighter rounded py-3 px-4" 
                id="name" 
                name="name" 
                type="text" 
                value="{{ old('name') }}">

            <p class="text-red">{{ $errors->first('name') }}</p>
        </div>

        <div class="w-1/4 px-3">
            <label class="block uppercase tracking-wide text-blue-dark text-xs font-bold mb-2" for="type">
                Type
            </label>
            <div class="relative">
                <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="type" name="type">
                    <option value="" {{ old('type') == '' ? 'selected' : '' }}>--- Select A Type ---</option>
                    <option value="Machine" {{ old('type') == 'Machine' ? 'selected' : '' }}>Machine</option>
                    <option value="Part" {{ old('type') == 'Part' ? 'selected' : '' }}>Part</option>
                </select>

                <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>

            <p class="text-red">{{ $errors->first('type') }}</p>
        </div>

    </div>

    <div class="-mx-3 md:flex mb-2 mt-6">

        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-blue-dark text-xs font-bold mb-2" for="description">
                Description
            </label>
            <input 
                class="appearance-none block w-full bg-grey-lighter text-blue-dark border border-grey-lighter rounded py-3 px-4" 
                id="description" 
                name="description" 
                type="text" 
                value="{{ old('description') }}">

            <p class="text-red">{{ $errors->first('description') }}</p>
        </div>

    </div>

    <button type="submit" class="w-1/4 inline-block bg-blue-dark hover:bg-blue rounded p-3 text-sm font-semibold text-white mr-2 mt-6">
        Create Asset
    </button>
</form>
@endsection
