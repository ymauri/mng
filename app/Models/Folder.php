<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $details
 * @property boolean $isroot
 * @property boolean $issheet
 * @property Furniture[] $furniture
 * @property Reportissue[] $reportissues
 * @property Reportissue[] $reportissues
 * @property Reportplanning[] $reportplannings
 * @property Rfolderfolder[] $rfolderfolders
 * @property Rfolderfolder[] $rfolderfolders
 * @property Rfolderfurniture[] $rfolderfurnitures
 */
class Folder extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'folder';

    /**
     * @var array
     */
    protected $fillable = ['details', 'isroot', 'issheet'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function furniture()
    {
        return $this->hasMany('App\Models\Furniture');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function room()
    {
        return $this->hasMany('App\Models\Reportissue', 'room_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function location()
    {
        return $this->hasMany('App\Models\Reportissue', 'location_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reportplannings()
    {
        return $this->hasMany('App\Models\Reportplanning');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function father()
    {
        return $this->hasMany('App\Models\Rfolderfolder', 'father_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function child()
    {
        return $this->hasMany('App\Models\Rfolderfolder', 'child_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rfolderfurnitures()
    {
        return $this->hasMany('App\Models\Rfolderfurniture', 'father_id');
    }
}
