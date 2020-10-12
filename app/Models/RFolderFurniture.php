<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $father_id
 * @property int $furniture_id
 * @property Folder $folder
 * @property Furniture $furniture
 */
class RFolderFurniture extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rfolderfurniture';

    /**
     * @var array
     */
    protected $fillable = ['father_id', 'furniture_id'];

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
    public function father()
    {
        return $this->belongsTo('App\Models\Folder', 'father_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function furniture()
    {
        return $this->belongsTo('App\Models\Furniture');
    }
}
