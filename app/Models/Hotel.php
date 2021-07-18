<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $userdoor_id
 * @property int $card_id
 * @property int $bill_id
 * @property string $verified
 * @property string $details
 * @property string $dated
 * @property string $finished_at
 * @property float $totalover
 * @property float $totalvoldan
 * @property float $totaltoer
 * @property float $totalparking
 * @property float $totalextra
 * @property float $totaldag
 * @property float $totalont
 * @property float $totalparkingextra
 * @property float $totalcontanten
 * @property float $totaldebit
 * @property float $totalcredit
 * @property float $kasver
 * @property float $totalccv
 * @property float $tax
 * @property float $parking
 * @property float $nightslimit
 * @property float $totalborg
 * @property float $totalretourborg
 * @property float $saldoborg
 * @property float $ammountparking
 * @property float $longStay
 * @property float $stripeguesy
 * @property float $stripeinvoice
 * @property float $bank
 * @property float $airbnb
 * @property float $pin
 * @property float $credit
 * @property float $contant
 * @property float $overige
 * @property float $omzet
 * @property Bill $bill
 * @property Card $card
 * @property Worker $worker
 * @property Hotelparking[] $hotelparkings
 * @property Rcheckinhotel[] $rcheckinhotels
 * @property Rcheckouthotel[] $rcheckouthotels
 * @property Rcleaningextrahotel[] $rcleaningextrahotels
 */
class Hotel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hotel';

    /**
     * @var array
     */
    protected $fillable = ['userdoor_id', 'card_id', 'bill_id', 'verified', 'details', 'dated', 'finished_at', 'totalover', 'totalvoldan', 'totaltoer', 'totalparking', 'totalextra', 'totaldag', 'totalont', 'totalparkingextra', 'totalcontanten', 'totaldebit', 'totalcredit', 'kasver', 'totalccv', 'tax', 'parking', 'nightslimit', 'totalborg', 'totalretourborg', 'saldoborg', 'ammountparking', 'longStay', 'stripeguesy', 'stripeinvoice', 'bank', 'airbnb', 'pin', 'credit', 'contant', 'overige', 'omzet', 'websitemollie'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bill()
    {
        return $this->belongsTo('App\Models\Bill');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function card()
    {
        return $this->belongsTo('App\Models\Card');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function worker()
    {
        return $this->belongsTo('App\Models\Worker', 'userdoor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hotelparkings()
    {
        return $this->hasMany('App\Models\Hotelparking');
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rcleaningextrahotels()
    {
        return $this->hasMany('App\Models\Rcleaningextrahotel');
    }
}
