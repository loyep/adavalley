@extends('layouts.app')

@section('body')
<div class="bg-white shadow-md rounded border border-gray-light px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
    <h1 class="title self-center mb-8">
        <a class="no-underline text-blue-darker" href="{{ route('work-orders.create') }}">Work Orders</a>
    </h1>

    @foreach($workOrders as $order)
        <a href="{{ route('work-orders.show', $order->id) }}">{{ $order->status}}: {{ $order->machine->name }}</a>
    @endforeach

</div>
@endsection