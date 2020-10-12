<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $cleaningextra_id
 * @property int $hotel_id
 * @property float $paymentAmount
 * @property int $paymentDay
 * @property boolean $payed
 * @property string $payedAt
 * @property Hotel $hotel
 * @property Cleaningextra $cleaningextra
 */
class RCleaningExtraHotel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rcleaningextrahotel';

    /**
     * @var array
     */
    protected $fillable = ['cleaningextra_id', 'hotel_id', 'paymentAmount', 'paymentDay', 'payed', 'payedAt'];

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
    public function cleaningextra()
    {
        return $this->belongsTo('App\Models\Cleaningextra');
    }
}
