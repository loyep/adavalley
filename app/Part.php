<?php

namespace App;

use App\Asset;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Part extends Model
{
    use SoftDeletes;

    /**
     * The attributes that can be modified.
     *
     * @var array
     */
    protected $fillable = ['name', 'number', 'description', 'asset_id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * A Part can be related to an Asset
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    /**
     * Gets the type of Asset
     * 
     * @return string
     */
    public function type()
    {
        echo 'Part';
    }

    /**
     * Deactivates the Part in database
     * 
     * @param integer|null
     * 
     * @return boolean
     */
    public function deactivate($id = null)
    {
        if (is_null($id)) $id = $this->id;

        if (! self::destroy($id)) return false;

        return true;
    }

    /**
     * Activates the Part in database
     * 
     * @return boolean
     */
    public function activate($id = null)
    {
        if (is_null($id)) $id = $this->id;

        if (! self::restore($id)) return false;

        return true;
    }
}
