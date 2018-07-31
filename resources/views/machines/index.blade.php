@extends('layouts.app')

@section('body')
<div class="bg-white pt-6 pb-8 mb-4 flex flex-col my-2">

    <h1 class="title self-center mb-8">
        <a class="no-underline text-blue-darker" href="{{ route('machines.create') }}">Machinery</a>
    </h1>

    <div class="flex flex-wrap justify-around">
        @forelse($machines as $machine)
        <a class="text-grey-darker no-underline rounded overflow-hidden shadow-md mb-4 w-1/3 border hover:bg-blue-lightest" href="{{ route('machines.show', $machine->id) }}">
            <div class="flex flex-col justify-between h-full">
                <!-- img -->
                <div class="px-6 py-4">

                    <div class="font-bold text-xl text-black mb-2">{{ $machine->name }}</div>

                    <h1 class="title text-base">
                        #{{ $machine->number }}
                    </h1>

                    <h2 class="subtitle text-base">
                        {{ $machine->description }}
                    </h2>
                </div>

                <div class="pin-b px-6 py-4 flex justify-between">
                    <div>
                        <button class="inline-block bg-blue hover:bg-blue-dark rounded-full px-3 py-2 text-sm font-semibold text-white mr-2">History</button>
                    </div>
                    <div>
                        <button class="inline-block bg-red hover:bg-red-dark rounded-full px-3 py-2 text-sm font-semibold text-white">Delete</button>
                    </div>
                </div>
            </div>
        </a>
        @empty
        <div class="text-red text-center">There are no machines</div>
        @endforelse
    </div>

</div>
@endsection