<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property float $wstandar
 * @property float $astandar
 * @property float $bstandar
 * @property float $wextra1
 * @property float $aextra1
 * @property float $bextra1
 * @property float $wextra2
 * @property float $aextra2
 * @property float $bextra2
 * @property float $wextra3
 * @property float $aextra3
 * @property float $bextra3
 * @property float $total
 * @property Kasboek $kasboek
 */
class KasboekFloats extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kasboekfloats';

    /**
     * @var array
     */
    protected $fillable = ['wstandar', 'astandar', 'bstandar', 'wextra1', 'aextra1', 'bextra1', 'wextra2', 'aextra2', 'bextra2', 'wextra3', 'aextra3', 'bextra3', 'total'];

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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kasboek()
    {
        return $this->hasOne('App\Models\Kasboek', 'floats_id');
    }
}
