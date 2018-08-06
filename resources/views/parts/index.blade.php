@extends('layouts.app')

@section('body')
<div class="bg-white pt-6 pb-8 mb-4 flex flex-col my-2">

    <table>
        <caption>
            <a class="no-underline text-blue-darker text-2xl" href="{{ route('parts.create') }}">Parts</a>
        </caption>
        <thead>
            <tr>
                <th class="border border-black border-2 p-1">Number</th>
                <th class="border border-black border-2 p-1">Name</th>
                <th class="border border-black border-2 p-1">Description</th>
            </tr>
        </thead>
        <tbody>
            @forelse($parts as $part)
            <tr>
                <td class="border border-black border-2 p-1">
                    <a class="no-underline" href="{{ route('parts.show', $part->id) }}">{{ $part->number }}</a>
                </td>
                <td class="border border-black border-2 p-1">{{ $part->name }}</td>
                <td class="border border-black border-2 p-1">{{ $part->description }}</td>
            </tr>
            @empty
            <tr>
                <td class="text-red text-center border border-black border-2 p-1" colspan="3">There are no parts in database</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection