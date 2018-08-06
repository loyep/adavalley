<?php

namespace App;

use App\WorkOrder;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'number',
        'name',
        'description',
    ];
}
