<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $details
 * @property string $value
 * @property string $pathimage
 * @property boolean $activeforrent
 * @property string $level
 * @property string $idguesty
 * @property array $type
 * @property float $maxprice
 * @property float $minprice
 * @property int $priority
 * @property string $status
 * @property string $updatedat
 * @property Blacklist[] $blacklists
 * @property Cleaning[] $cleanings
 * @property Cleaningextra[] $cleaningextras
 * @property Rcheckinhotel[] $rcheckinhotels
 * @property Rcheckouthotel[] $rcheckouthotels
 */
class Listing extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'listing';

    /**
     * @var array
     */
    protected $fillable = ['details', 'value', 'pathimage', 'activeforrent', 'level', 'idguesty', 'type', 'maxprice', 'minprice', 'priority', 'status', 'updatedat'];

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
    public function blacklists()
    {
        return $this->hasMany('App\Models\Blacklist');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cleanings()
    {
        return $this->hasMany('App\Models\Cleaning');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cleaningextras()
    {
        return $this->hasMany('App\Models\Cleaningextra');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rcheckinhotels()
    {
        return $this->hasMany('App\Models\Rcheckinhotel');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rcheckouthotels()
    {
        return $this->hasMany('App\Models\Rcheckouthotel');
    }

    /**
     * Mutator for type attribute
     * @param mixed $value
     *
     * @return [type]
     */
    public function getTypeAttribute($value) {
        return unserialize($value);
    }
}
