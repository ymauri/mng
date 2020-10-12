<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name1
 * @property string $name2
 * @property string $name3
 * @property float $bedrag1
 * @property float $bedrag2
 * @property float $bedrag3
 * @property float $total
 * @property Kasboek $kasboek
 */
class KasboekKas extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kasboekkas';

    /**
     * @var array
     */
    protected $fillable = ['name1', 'name2', 'name3', 'bedrag1', 'bedrag2', 'bedrag3', 'total'];

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
        return $this->hasOne('App\Models\Kasboek', 'kas_id');
    }
}
