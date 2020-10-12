<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $father_id
 * @property int $child_id
 * @property Folder $folder
 * @property Folder $folder
 */
class RFolderFolder extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rfolderfolder';

    /**
     * @var array
     */
    protected $fillable = ['father_id', 'child_id'];

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
    public function child()
    {
        return $this->belongsTo('App\Models\Folder', 'child_id');
    }
}
