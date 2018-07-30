<?php

namespace App;

use App\Machine;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $fillable = ['status', 'notes', 'machine_id'];

    /**
     * Get the Machine record associated with the WorkOrder.
     */
    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }
}
