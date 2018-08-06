@extends('layouts.app')

@section('body')
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
            </tr>
            @empty
            <tr>
                <td class="text-red text-center border border-black border-2 p-1">There are no assets in database</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection