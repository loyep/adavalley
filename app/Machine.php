<?php

namespace App;

use App\WorkOrder;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $fillable = [
        'number',
        'name',
        'description',
    ];
}
