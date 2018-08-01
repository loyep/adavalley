@extends('layouts.app')

@section('body')
<div class="flex border border-grey-darker p-2">
    Toolbar for actions
</div>

<div class="bg-white px-4 pt-6 pb-8 mb-4 flex flex-col my-2 text-sm">

    <div class="flex flex-col md:flex-row">

        <div class="w-full md:w-1/2">

            <div class="flex flex-col w-full mt-2">
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Asset Id:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">{{ $machine->id }}</div>
                </div>
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Creation Date:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">{{ $machine->created_at->format('m/d/Y') }}</div>
                </div>
            </div>

            <div class="flex flex-col w-full mt-2">
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Asset Type:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">Machine</div>
                </div>
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Asset #:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">{{ $machine->number }}</div>
                </div>
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Asset Name:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">{{ $machine->name }}</div>
                </div>
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Asset Desc:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">{{ $machine->description }}</div>
                </div>
            </div>

        </div>

        <div class="w-full md:w-1/2">

            <div class="flex flex-col w-full mt-2">
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Asset Parts:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">No parts associated with this asset</div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection