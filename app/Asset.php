<?php

namespace App;

use App\Part;
use App\WorkOrder;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'number',
        'name',
        'description',
    ];

    public function orders()
    {
        return $this->hasMany(WorkOrder::class);
    }

    public function parts()
    {
        return $this->hasMany(Part::class);
    }
}
