<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $in_id
 * @property int $out_id
 * @property int $los_id
 * @property int $rol_id
 * @property int $waarde_id
 * @property int $bedrag_id
 * @property int $floats_id
 * @property int $salarissen_id
 * @property int $kas_id
 * @property string $name
 * @property string $details
 * @property string $dated
 * @property string $updated
 * @property string $finished
 * @property float $totalsalarissenkas
 * @property float $totalinkas
 * @property float $kasverschil
 * @property float $eindsaldo
 * @property float $beginsaldo
 * @property Kasboekin $kasboekin
 * @property Kasboekfloat $kasboekfloat
 * @property Kasboekcontanten $kasboekcontanten
 * @property Kasboekout $kasboekout
 * @property Kasboekcontanten $kasboekcontanten
 * @property Kasboeksalarissen $kasboeksalarissen
 * @property Kasboekka $kasboekka
 * @property Kasboekcontanten $kasboekcontanten
 * @property Kasboekcontanten $kasboekcontanten
 */
class Kasboek extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kasboek';

    /**
     * @var array
     */
    protected $fillable = ['in_id', 'out_id', 'los_id', 'rol_id', 'waarde_id', 'bedrag_id', 'floats_id', 'salarissen_id', 'kas_id', 'name', 'details', 'dated', 'updated', 'finished', 'totalsalarissenkas', 'totalinkas', 'kasverschil', 'eindsaldo', 'beginsaldo'];

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
    public function kasboekin()
    {
        return $this->belongsTo('App\Models\Kasboekin', 'in_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kasboekfloat()
    {
        return $this->belongsTo('App\Models\Kasboekfloat', 'floats_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function los()
    {
        return $this->belongsTo('App\Models\Kasboekcontanten', 'los_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function out()
    {
        return $this->belongsTo('App\Models\Kasboekout', 'out_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rol()
    {
        return $this->belongsTo('App\Models\Kasboekcontanten', 'rol_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kasboeksalarissen()
    {
        return $this->belongsTo('App\Models\Kasboeksalarissen', 'salarissen_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kasboekka()
    {
        return $this->belongsTo('App\Models\Kasboekka', 'kas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bedrag()
    {
        return $this->belongsTo('App\Models\Kasboekcontanten', 'bedrag_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kasboekcontanten()
    {
        return $this->belongsTo('App\Models\Kasboekcontanten', 'waarde_id');
    }


}
