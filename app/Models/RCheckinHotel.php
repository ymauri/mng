<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $checkin_id
 * @property int $hotel_id
 * @property int $source_id
 * @property int $listing_id
 * @property boolean $checkindone
 * @property int $nights
 * @property int $guests
 * @property float $parkingdag
 * @property float $parking
 * @property float $latecheckin
 * @property float $betalen
 * @property float $totalbetalen
 * @property float $voldan
 * @property string $name
 * @property string $details
 * @property string $toer
 * @property boolean $fromguesty
 * @property float $borg
 * @property float $balance
 * @property float $totalpaid
 * @property string $sourceguesty
 * @property boolean $readytoclear
 * @property string $notes
 * @property string $timeforcheck
 * @property boolean $blacklist
 * @property array $paymentrecive
 * @property float $paymentprofit
 * @property Hotel $hotel
 * @property Source $source
 * @property Checkin $checkin
 * @property Listing $listing
 */
class RCheckinHotel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rcheckinhotel';

    /**
     * @var array
     */
    protected $fillable = ['checkin_id', 'hotel_id', 'source_id', 'listing_id', 'checkindone', 'nights', 'guests', 'parkingdag', 'parking', 'latecheckin', 'betalen', 'totalbetalen', 'voldan', 'name', 'details', 'toer', 'fromguesty', 'borg', 'balance', 'totalpaid', 'sourceguesty', 'readytoclear', 'notes', 'timeforcheck', 'blacklist', 'paymentrecive', 'paymentprofit'];

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
    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function source()
    {
        return $this->belongsTo('App\Models\Source');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function checkin()
    {
        return $this->belongsTo('App\Models\Checkin');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function listing()
    {
        return $this->belongsTo('App\Models\Listing');
    }
}
