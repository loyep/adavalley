<?php

namespace App;

use App\Part;
use App\WorkOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Asset extends Model
{
    protected $fillable = [
        'number',
        'name',
        'description',
    ];

    /**
     * Get all Orders associated with the Asset.
     * 
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(WorkOrder::class);
    }

    /**
     * Get all Parts associated with the Asset.
     * 
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parts()
    {
        return $this->hasMany(Part::class);
    }

    /**
     * Associate a Part with the Asset.
     *
     * @param  App\Part|Illuminate\Database\Eloquent\Collection  $part
     * @return $this
     */
    public function addPart($part)
    {
        if ($part instanceof Collection) {
            return $this->addParts($part);
        }

        $this->parts()->save($part);

        return $this;
    }

    /**
     * Associate a Collection of Parts with the Asset.
     *
     * @param  Illuminate\Database\Eloquent\Collection|App\Part  $parts
     * @return $this
     */
    public function addParts($parts)
    {
        if ($parts instanceof Part) {
            return $this->addPart($parts);
        }

        $this->parts()->saveMany($parts);

        return $this;
    }
}
