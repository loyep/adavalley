<?php

namespace App;

use App\Asset;
use App\Employee;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $fillable = ['status', 'notes', 'asset_id', 'employee_id'];

    /**
     * Get the Asset record associated with the WorkOrder.
     */
    public function asset()
    {
        return $this->belongsTo(Asset::class)->withDefault([
            'name' => '-----NA-----',
        ]);
    }

    /**
     * Get the Employee record associated with the WorkOrder.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class)->withDefault([
            'name' => '-----NA-----',
        ]);
    }
}
