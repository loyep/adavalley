@extends('layouts.app')

@section('body')
<div class="bg-white shadow-md rounded border border-gray-light pt-6 pb-8 mb-4 flex flex-wrap justify-around my-2">

    @forelse($machines as $machine)
    <a class="text-grey-darker no-underline rounded overflow-hidden shadow-md mb-4 w-1/3 border hover:bg-green-lightest" href="{{ route('machines.show', $machine->id) }}">
        <div class="flex flex-col justify-between h-full">
            <!-- img -->
            <div class="px-6 py-4">

                <div class="font-bold text-xl text-black mb-2">{{ $machine->name }}</div>

                <h2 class="title text-base">
                    #{{ $machine->number }}
                </h2>

                <h3 class="subtitle text-base">
                    {{ $machine->description }}
                </h3>
            </div>

            <div class="pin-b px-6 py-4 flex justify-between">
                <div>
                    <button class="inline-block bg-indigo hover:bg-indigo-light rounded-full px-3 py-2 text-sm font-semibold text-white mr-2">History</button>
                </div>
                <div>
                    <button class="inline-block bg-red hover:bg-red-light rounded-full px-3 py-2 text-sm font-semibold text-white">Delete</button>
                </div>
            </div>
        </div>
    </a>
    @empty
    <div class="text-red text-center">No Machines In Database</div>
    @endforelse

</div>
@endsection