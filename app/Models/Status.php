<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Furniture[] $furniture
 */
class Status extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'status';

    /**
     * @var array
     */
    protected $fillable = ['name'];

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
    public function furniture()
    {
        return $this->hasMany('App\Models\Furniture');
    }
}
