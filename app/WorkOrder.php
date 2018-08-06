<?php

namespace App;

use App\Asset;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $fillable = ['status', 'notes', 'asset_id'];

    /**
     * Get the Asset record associated with the WorkOrder.
     */
    public function asset()
    {
        return $this->belongsTo(Asset::class)->withDefault([
            'name' => '-----NA-----',
        ]);
    }
}
