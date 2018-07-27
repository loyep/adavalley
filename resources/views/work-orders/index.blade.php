@extends('layouts.app')

@section('body')
<div class="bg-white shadow-md rounded border border-gray-light px-8 pt-6 pb-8 mb-4 flex flex-col my-2">

    @foreach($workOrders as $order)
        <p>{{ $order->status }}</p>
    @endforeach

</div>
@endsection