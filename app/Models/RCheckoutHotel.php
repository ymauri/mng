<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $listing_id
 * @property int $hotel_id
 * @property int $checkout_id
 * @property boolean $checkoutdone
 * @property string $details
 * @property boolean $fromguesty
 * @property string $name
 * @property string $status
 * @property string $changestatusat
 * @property float $borg
 * @property Checkout $checkout
 * @property Hotel $hotel
 * @property Listing $listing
 * @property Cleaning[] $cleanings
 */
class RCheckoutHotel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rcheckouthotel';

    /**
     * @var array
     */
    protected $fillable = ['listing_id', 'hotel_id', 'checkout_id', 'checkoutdone', 'details', 'fromguesty', 'name', 'status', 'changestatusat', 'borg'];

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
    public function checkout()
    {
        return $this->belongsTo('App\Models\Checkout');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
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
    public function cleanings()
    {
        return $this->hasMany('App\Models\Cleaning', 'checkout');
    }
}
