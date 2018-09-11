@extends('layouts.app')

@section('body')
<ul class="flex list-reset my-1">
    <li class="border border-black mr-1 rounded bg-yellow-lighter">
        <a href="{{ route('assets.edit', $asset->id) }}" class="no-underline text-center text-black block rounded hover:bg-grey-lighter py-2 px-4">Edit</a>
    </li>
    <li class="relative border border-black mr-1 rounded bg-blue-lighter">
        <dropdown-link>
            <div slot="link">Actions</div>
            
            <div slot="dropdown">
                <ul class="list-reset">
                    <li>
                        <a href="#" class="no-underline block px-4 py-3 border-b text-grey-darkest hover:bg-blue-lightest hover:text-black whitespace-no-wrap">Add Parts</a>
                    </li>
                    <li>
                        <a href="{{ route('assets.destroy', $asset->id) }}" class="no-underline block px-4 py-3 border-b text-grey-darkest hover:bg-red-lightest hover:text-black whitespace-no-wrap">Delete</a>
                    </li>
                </ul>

            </div>
        </dropdown-link>
    </li>
</ul>

<div class="bg-white px-4 pt-6 pb-8 mb-4 flex flex-col text-sm border rounded border-grey-darker">

    <div class="flex flex-col md:flex-row">

        <div class="w-full md:w-1/2">

            <div class="flex flex-col w-full mt-2">
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Asset Id:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">{{ $asset->id }}</div>
                </div>
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Creation Date:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">{{ $asset->created_at->format('m/d/Y') }}</div>
                </div>
            </div>

            <div class="flex flex-col w-full mt-2">
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Asset Type:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">{{ $asset->type }}</div>
                </div>
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Asset #:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">{{ $asset->number }}</div>
                </div>
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Asset Name:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">{{ $asset->name }}</div>
                </div>
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Asset Desc:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">{{ $asset->description }}</div>
                </div>
            </div>

        </div>

        <div class="w-full md:w-1/2">

            <div class="flex flex-col w-full mt-2">
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Parts:</div>

                    <div class="w-3/4 text-left bg-grey-lighter p-1">
                        <ul class="list-reset -mt-3">
                            @forelse($asset->parts as $part)
                            <li class="mt-3">
                                <a href="{{ route('parts.show', $part->id) }}">{{ $part->number }}</a>
                            </li>
                            @empty
                                <li class="mt-3">There are no parts associated with this asset.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection