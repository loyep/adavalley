<?php

namespace App;

use App\Asset;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $fillable = ['name', 'number', 'description', 'asset_id'];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
