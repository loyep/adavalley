@extends('layouts.app')

@section('body')
<ul class="flex list-reset my-1">
    <li class="border border-black rounded">
        <a class="no-underline text-center block border border-white rounded hover:border-grey-lighter text-black hover:bg-grey-lighter py-2 px-4" href="#">Edit</a>
    </li>
    <li class="border border-black rounded border-l-0">
        <a class="no-underline text-center text-black block rounded hover:border-grey-lighter hover:bg-grey-lighter py-2 px-4" href="#">Delete</a>
    </li>
    <li class="relative border border-black rounded border-l-0">
        <dropdown-link>
            <div slot="link">Actions</div>
            
            <div slot="dropdown">
                <a href="#" class="no-underline block px-4 py-3 border-b text-grey-darkest bg-white hover:text-white hover:bg-blue whitespace-no-wrap">Add Parts</a>
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
                    <div class="w-3/4 text-left bg-grey-lighter p-1">Machine</div>
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
                                <div class="w-3/4 text-left bg-grey-lighter p-1">There are no parts associated with this asset.</div>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection