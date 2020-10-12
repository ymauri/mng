<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $checkout
 * @property int $listing_id
 * @property string $status
 * @property string $dated
 * @property boolean $isextra
 * @property string $clean_at
 * @property boolean $deleted
 * @property string $description
 * @property Rcheckouthotel $rcheckouthotel
 * @property Listing $listing
 * @property Cleaninglog[] $cleaninglogs
 */
class Cleaning extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cleaning';

    /**
     * @var array
     */
    protected $fillable = ['checkout', 'listing_id', 'status', 'dated', 'isextra', 'clean_at', 'deleted', 'description'];

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rcheckouthotel()
    {
        return $this->belongsTo('App\Models\Rcheckouthotel', 'checkout');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function listing()
    {
        return $this->belongsTo('App\Models\Listing');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cleaninglogs()
    {
        return $this->hasMany('App\Models\Cleaninglog', 'cleaning');
    }
}
