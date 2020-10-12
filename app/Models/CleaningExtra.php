<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $listing_id
 * @property string $begin
 * @property string $end
 * @property string $details
 * @property array $dayweek
 * @property int $paymentDay
 * @property float $paymentAmount
 * @property Listing $listing
 * @property Rcleaningextrahotel[] $rcleaningextrahotels
 */
class CleaningExtra extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cleaningextra';

    /**
     * @var array
     */
    protected $fillable = ['listing_id', 'begin', 'end', 'details', 'dayweek', 'paymentDay', 'paymentAmount'];

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
    public function listing()
    {
        return $this->belongsTo('App\Models\Listing');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rcleaningextrahotels()
    {
        return $this->hasMany('App\Models\Rcleaningextrahotel');
    }
}
