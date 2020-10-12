<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $details
 * @property boolean $isactive
 * @property boolean $extrafield
 * @property string $guesty
 * @property Rcheckinhotel[] $rcheckinhotels
 */
class Source extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'source';

    /**
     * @var array
     */
    protected $fillable = ['details', 'isactive', 'extrafield', 'guesty'];

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rcheckinhotels()
    {
        return $this->hasMany('App\Models\Rcheckinhotel');
    }
}
