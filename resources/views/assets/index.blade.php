@extends('layouts.app')

@section('body')
@if (session('status'))
    <span class="fixed pin-t pin-r bg-yellow py-4 px-3 text-lg mt-16 mr-16 rounded">
        {{ session('status') }}
    </span>
@endif
<div class="bg-white pt-6 pb-8 mb-4 flex flex-col my-2">

    <table>
        <caption>
            <a class="no-underline text-blue-darker text-2xl" href="{{ route('assets.create') }}">Assets</a>
        </caption>
        <thead>
            <tr>
                <th class="border border-black border-2 p-1">Number</th>
                <th class="border border-black border-2 p-1">Name</th>
                <th class="border border-black border-2 p-1">Description</th>
                <th class="border border-black border-2 p-1">Active</th>
            </tr>
        </thead>
        <tbody>
            @forelse($assets as $asset)
            <tr>
                <td class="border border-black border-2 p-1">
                    <a class="no-underline" href="{{ route('assets.show', $asset->id) }}">{{ $asset->number }}</a>
                </td>
                <td class="border border-black border-2 p-1">{{ $asset->name }}</td>
                <td class="border border-black border-2 p-1">{{ $asset->description }}</td>
                <td class="border border-black border-2 p-1 text-center">{{ $asset->trashed() ? 'No' : 'Yes' }}
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-red text-center border border-black border-2 p-1">There are no assets in database</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection