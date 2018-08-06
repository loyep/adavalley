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

        <div class="w-3/4 px-3">
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
