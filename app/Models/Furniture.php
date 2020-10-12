<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $folder_id
 * @property int $status_id
 * @property string $details
 * @property string $name
 * @property string $pathimage
 * @property string $serialnumber
 * @property int $quantity
 * @property float $price
 * @property float $totalvalue
 * @property string $pathfolder
 * @property Folder $folder
 * @property Status $status
 * @property Reportissue[] $reportissues
 * @property Reportplanning[] $reportplannings
 * @property Rfolderfurniture[] $rfolderfurnitures
 * @property Tag[] $tags
 */
class Furniture extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['folder_id', 'status_id', 'details', 'name', 'pathimage', 'serialnumber', 'quantity', 'price', 'totalvalue', 'pathfolder'];

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
    public function folder()
    {
        return $this->belongsTo('App\Models\Folder');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reportissues()
    {
        return $this->hasMany('App\Models\Reportissue');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reportplannings()
    {
        return $this->hasMany('App\Models\Reportplanning');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rfolderfurnitures()
    {
        return $this->hasMany('App\Models\Rfolderfurniture');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'rfurnituretags');
    }
}
