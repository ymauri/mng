<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $kasboekhotel_id
 * @property float $day
 * @property float $overnachtingen
 * @property float $parking
 * @property float $toeristenbelasting
 * @property float $totaalont
 * @property float $contanten
 * @property float $debit
 * @property float $credit
 * @property float $totaalnaar
 * @property float $kasverschil
 * @property float $longstay
 * @property Kasboekhotel $kasboekhotel
 */
class KasboekHotelForms extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kasboekhotelforms';

    /**
     * @var array
     */
    protected $fillable = ['kasboekhotel_id', 'day', 'overnachtingen', 'parking', 'toeristenbelasting', 'totaalont', 'contanten', 'debit', 'credit', 'totaalnaar', 'kasverschil', 'longstay'];

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
    public function kasboekhotel()
    {
        return $this->belongsTo('App\Models\Kasboekhotel');
    }
}
