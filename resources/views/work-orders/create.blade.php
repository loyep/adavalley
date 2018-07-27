@extends('layouts.app')

@section('body')
<div class="bg-white shadow-md rounded border border-gray-light px-8 pt-6 pb-8 mb-4 flex flex-col my-2">

    <form class="w-1/4 px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
            Machine:
        </label>
        <div class="relative">
            <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
                @forelse($machines as $machine)
                    <option value="{{ $machine->id }}">{{ $machine->name }}</option>
                @empty
                    <option value="">No Machines In Database</option>
                @endforelse
            </select>

            <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>

        <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded mt-4">
            Create Work Order
        </button>
    </form>

</div>
@endsection