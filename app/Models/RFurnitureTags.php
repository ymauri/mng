<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $furniture_id
 * @property int $tag_id
 * @property Tag $tag
 * @property Furniture $furniture
 */
class RFurnitureTags extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rfurnituretags';

    /**
     * @var array
     */
    protected $fillable = [];

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
    public function tag()
    {
        return $this->belongsTo('App\Models\Tag');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function furniture()
    {
        return $this->belongsTo('App\Models\Furniture');
    }
}
