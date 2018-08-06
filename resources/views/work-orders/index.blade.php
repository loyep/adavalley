@extends('layouts.app')

@section('body')
<div class="bg-white pt-6 pb-8 mb-4 flex flex-col my-2">

    <table>
        <caption>
            <a class="no-underline text-blue-darker text-2xl" href="{{ route('work-orders.create') }}">Work Orders</a>
        </caption>
        <thead>
            <tr>
                <th class="border border-black border-2 p-1">Order #</th>
                <th class="border border-black border-2 p-1">Status</th>
                <th class="border border-black border-2 p-1">Asset</th>
                <th class="border border-black border-2 p-1">Issue</th>
            </tr>
        </thead>
        <tbody>
            @forelse($workOrders as $order)
            <tr>
                <td class="border border-black border-2 p-1">
                    <a class="no-underline" href="{{ route('work-orders.show', $order->id) }}">{{ $order->id }}</a>
                </td>
                <td class="border border-black border-2 p-1">{{ $order->status }}</td>
                <td class="border border-black border-2 p-1">{{ $order->asset->name }}</td>
                <td class="border border-black border-2 p-1">{{ $order->notes }}</td>
            </tr>
            @empty
            <tr>
                <td class="text-red text-center border border-black border-2 p-1">No work orders!  Great job maintaing our equipment.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection