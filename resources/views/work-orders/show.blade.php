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
                    <div class="w-3/4 text-left bg-grey-lighter p-1">PM</div>
                </div>
            </div>

            <div class="flex flex-col w-full mt-2">
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Asset ID:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">{{ $workOrder->machine->id }}</div>
                </div>
                <div class="flex justify-center">
                    <div class="w-1/4 text-right p-1">Asset Desc:</div>
                    <div class="w-3/4 text-left bg-grey-lighter p-1">{{ $workOrder->machine->description }}</div>
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
                    <div class="w-3/4 text-left bg-grey-lighter p-1">Jordan Rozeboom</div>
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