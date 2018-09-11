@extends('layouts.app')

@section('body')
<ul class="flex list-reset my-1">
    <li class="border border-black mr-1 rounded bg-green-lighter">
        <button type="submit" class="no-underline text-center block border border-white rounded hover:border-grey-lighter text-black hover:bg-grey-lighter py-2 px-4" form="update">Save</button>
    </li>
    <li class="border border-black mr-1 rounded bg-red-lighter">
        <button type="submit" form="delete" class="no-underline text-center text-black block rounded hover:border-grey-lighter hover:bg-grey-lighter py-2 px-4">Delete</button>
    </li>
</ul>

<form id="delete" method="POST" action="{{ route('assets.destroy', $asset->id) }}">
    @method('delete')
    @csrf
</form>

<div class="bg-white px-4 pt-6 pb-8 mb-4 flex flex-col text-sm border rounded border-grey-darker">

    <div class="flex flex-col md:flex-row">

        <div class="w-full md:w-1/2">

            <div class="flex flex-col w-full bg-grey-lighter px-1">
                <div class="flex justify-center items-center">
                    <div class="w-1/4 text-right my-1 p-2">Asset Id:</div>
                    <div class="w-3/4 text-left my-1 p-2">{{ $asset->id }}</div>
                </div>
                <div class="flex justify-center items-center">
                    <div class="w-1/4 text-right my-1 p-2">Creation Date:</div>
                    <div class="w-3/4 text-left my-1 p-2">{{ $asset->created_at->format('m/d/Y') }}</div>
                </div>
            </div>

            <form id="update" action="{{ route('assets.update', $asset->id) }}" method="POST">
                @method('PUT')
                @csrf

                <div class="flex flex-col w-full bg-grey-lighter px-1">
                    <div class="flex justify-center items-center">
                        <label for="number" class="label w-1/4 text-right my-1 p-2">Asset Type:</label>
                       
                        <div class="relative w-3/4">
                            <select class="block appearance-none bg-white w-full border border-grey-lighter py-3 px-4 pr-8 rounded" id="type" name="type">
                                <option value="" {{ old('type') == '' || $asset->type == '' ? 'selected' : '' }}>--- Select A Type ---</option>
                                <option value="Machine" {{ old('type') == 'Machine' || $asset->type == 'Machine' ? 'selected' : '' }}>Machine</option>
                                <option value="Part" {{ old('type') == 'Part' || $asset->type == 'Part' ? 'selected' : '' }}>Part</option>
                            </select>

                            <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                
                        <!-- <input id="type" name="type" class="input w-3/4 text-left my-1 p-2" value="{{ $asset->type ?? old('type') }}" /> -->
                    </div>
                    <div class="flex justify-center items-center">
                        <label for="number" class="label w-1/4 text-right my-1 p-2">Asset #:</label>
                        <input id="number" name="number" class="input w-3/4 text-left my-1 p-2" value="{{ $asset->number ?? old('number') }}" />
                    </div>
                    <div class="flex justify-center items-center">
                        <label for="name" class="label w-1/4 text-right my-1 p-2">Asset Name:</label>
                        <input id="name" name="name" class="input w-3/4 text-left my-1 p-2" value="{{ $asset->name ?? old('name') }}" />
                    </div>
                    <div class="flex justify-center items-center">
                        <label for="description" class="label w-1/4 text-right my-1 p-2">Asset Desc:</label>
                        <input id="description" name="description" class="input w-3/4 text-left my-1 p-2" value="{{ $asset->description ?? old('description') }}" />
                    </div>
                </div>
            </form>

        </div>

        <div class="w-full md:w-1/2 ml-1">

            <div class="flex flex-col w-full bg-grey-lighter px-1">
                <div class="flex justify-center items-center">
                    <div class="w-1/4 text-right my-1 p-2">Parts:</div>

                    <div class="w-3/4 text-left my-1 p-2">
                        <ul class="list-reset">
                            @forelse($asset->parts as $part)
                            <li class="mt-3">
                                <a href="{{ route('parts.show', $part->id) }}">{{ $part->number }}</a>
                            </li>
                            @empty
                                <div class="w-3/4 text-left my-1 p-2">There are no parts associated with this asset.</div>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection