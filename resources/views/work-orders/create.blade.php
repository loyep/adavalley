@extends('layouts.app')

@section('body')
<div class="bg-white shadow-md rounded border border-gray-light px-8 pt-6 pb-8 mb-4 flex flex-col my-2">

    <form method="POST" action="{{ route('work-orders.store') }}" class="px-3">
        {{ csrf_field() }}

        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 mt-6" for="asset_id">
            Asset
        </label>
        <div class="relative">
            <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="asset_id" name="asset_id">
                <option value="">Select A Asset</option>

                @forelse($assets as $asset)
                <option value="{{ $asset->id }}">{{ $asset->name }}</option>
                @empty
                <option value="">No Assets In Database</option>
                @endforelse
            </select>

            <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>

        <p class="text-red">{{ $errors->first('asset_id') }}</p>

        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 mt-6" for="status">
            Status
        </label>
        <div class="relative">
            <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="status" name="status">
                <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Assigned" {{ old('status') == 'Assigned' ? 'selected' : '' }}>Assigned</option>
                <option value="In Process" {{ old('status') == 'In Process' ? 'selected' : '' }}>In Process</option>
                <option value="Complete" {{ old('status') == 'Complete' ? 'selected' : '' }}>Complete</option>
                <option value="Archived" {{ old('status') == 'Archived' ? 'selected' : '' }}>Archived</option>
            </select>

            <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>

        <p class="text-red">{{ $errors->first('status') }}</p>

        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 mt-6" for="notes">
            Note
        </label>
        <div>
            <input 
                class="appearance-none block w-full bg-grey-lighter border border-grey-lighter rounded py-3 px-4" 
                id="notes" 
                name="notes" 
                type="text" 
                value="{{ old('notes') }}"
            >
        </div>  
        
        <p class="text-red">{{ $errors->first('notes') }}</p>

        <button class="w-1/4 inline-block bg-blue-dark hover:bg-blue rounded p-3 text-sm font-semibold text-white mr-2 mt-6" type="submit">
            Create Work Order
        </button>
    </form>

</div>
@endsection