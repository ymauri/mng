<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $idcalendar
 * @property int $price
 * @property string $checkin
 * @property string $listing
 * @property string $status
 * @property boolean $applied
 * @property string $reservation
 * @property int $newprice
 * @property string $created_at
 * @property string $upated_at
 * @property array $rule
 */
class ListingCalendar extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'listingcalendar';

    /**
     * @var array
     */
    protected $fillable = ['idcalendar', 'price', 'checkin', 'listing', 'status', 'applied', 'reservation', 'newprice', 'rule', 'created_at', 'updated_at'];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'U';

    public function getRuleAttribute() {
        return !empty($this->attributes['rule']) ? json_decode($this->attributes['rule']) : [];
    }

}
