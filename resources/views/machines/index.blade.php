@extends('layouts.app')

@section('body')
<div class="bg-white shadow-md rounded border border-gray-light px-8 pt-6 pb-8 mb-4 flex flex-col my-2">

    @foreach($machines as $machine)
        <span>{{ $machine->name }}</span>
        <span>{{ $machine->number }}</span>
        <span>{{ $machine->description }}</span>
    @endforeach

</div>
@endsection