<?php

namespace App;

use App\Part;
use App\WorkOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'number',
        'name',
        'description',
        'type',
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

    /**
     * Deactivates the Asset
     * 
     * @param integer|null
     * 
     * @return boolean
     */
    public function deactivate($id = null)
    {
        if (is_null($id)) $id = $this->id;

        return self::destroy($id);
    }

    /**
     * Activates the Asset
     * 
     * @return boolean
     */
    public function activate($id = null)
    {
        if (is_null($id)) $id = $this->id;

        return self::restore($id);
    }
}
