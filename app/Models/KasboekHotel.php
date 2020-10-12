<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $float_id
 * @property string $name
 * @property string $details
 * @property string $dated
 * @property string $updated
 * @property string $finished
 * @property float $overnachtingen
 * @property float $parking
 * @property float $toeristenbelasting
 * @property float $totaalont
 * @property float $contanten
 * @property float $debit
 * @property float $credit
 * @property float $totaalnaar
 * @property float $kasverschil
 * @property float $totaalborg
 * @property float $longstay
 * @property float $stripeguesty
 * @property float $stripeinvoice
 * @property float $bank
 * @property float $airbnb
 * @property float $omzet
 * @property Kasboekhotelfloat $kasboekhotelfloat
 * @property Kasboekhotelform[] $kasboekhotelforms
 */
class KasboekHotel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kasboekhotel';

    /**
     * @var array
     */
    protected $fillable = ['float_id', 'name', 'details', 'dated', 'updated', 'finished', 'overnachtingen', 'parking', 'toeristenbelasting', 'totaalont', 'contanten', 'debit', 'credit', 'totaalnaar', 'kasverschil', 'totaalborg', 'longstay', 'stripeguesty', 'stripeinvoice', 'bank', 'airbnb', 'omzet'];

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
    public function kasboekhotelfloat()
    {
        return $this->belongsTo('App\Models\Kasboekhotelfloat', 'float_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kasboekhotelforms()
    {
        return $this->hasMany('App\Models\Kasboekhotelform');
    }
}
