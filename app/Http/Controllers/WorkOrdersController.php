<?php

namespace App\Http\Controllers;

use App\Machine;
use App\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use App\Http\Requests\StoreWorkOrderRequest;

class WorkOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workOrders = WorkOrder::all();

        return view('work-orders.index', compact('workOrders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $machines = Machine::all();

        return view('work-orders.create', compact('machines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'notes' => 'nullable|string|max:255',
        ]);

        $v->sometimes('machine_id', 'required|exists:machines,id', function ($input) {
            return in_array($input->status, ['assigned', 'in process', 'complete', 'archived']);
        });

        $v->sometimes('status', 'required|' . Rule::in(['assigned', 'in process', 'complete', 'archived']), function ($input) {
            return $input->machine_id > 0;
        })->validate();

        $workOrder = new WorkOrder($v->valid());

        $workOrder->save();
        
        return view('work-orders.show', compact('workOrder'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function show(WorkOrder $workOrder)
    {
        return view('work-orders.show', compact('workOrder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkOrder $workOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkOrder $workOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkOrder $workOrder)
    {
        //
    }
}
