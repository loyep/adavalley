@extends('layouts.app')

@section('body')
<ul class="flex list-reset my-1">
    <li class="border border-black rounded">
        <a class="no-underline text-center block border border-white rounded hover:border-grey-lighter text-black hover:bg-grey-lighter py-2 px-4" href="{{ route('work-orders.edit', $workOrder->id) }}">Edit</a>
    </li>
    <li class="border border-black rounded border-l-0">
        <a class="no-underline text-center block border border-white rounded hover:border-grey-lighter text-black hover:bg-grey-lighter py-2 px-4" href="#" onclick="document.forms.delete.submit()">
            <form name="delete" action="{{ route('work-orders.destroy', [$workOrder->id]) }}" method="POST">
                @method('delete')
                @csrf
                <button class="btn btn-default" type="submit">Delete</button>
            </form>
        </a>
    </li>
    <li class="relative border border-black rounded border-l-0">
        <div role="button" class="inline-block select-none">
            <span class="appearance-none flex items-center inline-block text-black hover:bg-grey-lighter py-2 px-4 rounded">
                <span class="mr-1">Actions</span>

                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </span>
        </div>
        <div class="absolute pin-l mt-px hidden">
            <div class="bg-white shadow rounded border overflow-hidden">
                <a href="#" class="no-underline block px-4 py-3 border-b text-grey-darkest bg-white hover:text-white hover:bg-blue whitespace-no-wrap">Action</a>
                <a href="#" class="no-underline block px-4 py-3 border-b text-grey-darkest bg-white hover:text-white hover:bg-blue whitespace-no-wrap">Another action</a>
                <a href="#" class="no-underline block px-4 py-3 border-b text-grey-darkest bg-white hover:text-white hover:bg-blue whitespace-no-wrap">Something else here</a>
            </div>
        </div>
    </li>
</ul>

<div class="bg-white px-4 pt-6 pb-8 mb-4 flex flex-col text-sm border rounded border-grey-darker">

    <div class="flex flex-col md:flex-row">

        <div class="w-full md:w-1/2">

            <div class="flex flex-col w-full mt-2">
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">WO #:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">{{ $workOrder->id }}</div>
                </div>
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">WO Date:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">{{ $workOrder->created_at->format('m/d/Y') }}</div>
                </div>
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">WO Time:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">{{ $workOrder->created_at->format('h:i A') }}</div>
                </div>
            </div>

            <div class="flex flex-col w-full mt-2">
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">WO Type:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">Preventive Maintenance</div>
                </div>
            </div>

            <div class="flex flex-col w-full mt-2">
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Asset Number:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">
                        @if($workOrder->asset->id)
                        <a class="no-underline hover:underline" href="{{ route('assets.show', $workOrder->asset->id) }}">{{ $workOrder->asset->number }}</a>
                        @else
                        No asset assigned.
                        @endif
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Asset Desc:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">{{ $workOrder->asset->description }}</div>
                </div>
            </div>

            <div class="flex flex-col w-full mt-2">
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Request #:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">128</div>
                </div>
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Assign To Type:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">Employee</div>
                </div>
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Assign To:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">{{ $workOrder->employee->name }}</div>
                </div>
            </div>

        </div>

        <div class="w-full md:w-1/2">

            <div class="flex flex-col w-full mt-2">
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Status:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">{{ ucwords($workOrder->status[0]) }}</div>
                </div>
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Job Status:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">{{ ucwords($workOrder->status) }}</div>
                </div>
            </div>

            <div class="flex flex-col w-full mt-2">
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Completion Date:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1"></div>
                </div>
            </div>

            <div class="flex flex-col w-full mt-2">
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Downtime:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1"></div>
                </div>
            </div>

            <div class="flex flex-col w-full mt-2">
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Priority:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">3</div>
                </div>
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Est. Hours:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">0.8</div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection