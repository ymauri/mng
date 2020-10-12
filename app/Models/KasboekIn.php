<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property float $omzkitchen
 * @property float $omzlaag
 * @property float $omzhoog
 * @property float $omzspacerent
 * @property float $omzvoucher
 * @property float $omzentry
 * @property float $omzparking
 * @property float $omzothers
 * @property float $omztotalin
 * @property float $omzexkitchen
 * @property float $omzexlaag
 * @property float $omzexhoog
 * @property float $omzexspacerent
 * @property float $omzexvoucher
 * @property float $omzexentry
 * @property float $omzexparking
 * @property float $omzexothers
 * @property float $omzextotalin
 * @property float $omzbtwkitchen
 * @property float $omzbtwlaag
 * @property float $omzbtwhoog
 * @property float $omzbtwspacerent
 * @property float $omzbtwvoucher
 * @property float $omzbtwentry
 * @property float $omzbtwparking
 * @property float $omzbtwothers
 * @property float $omzbtwtotalin
 * @property Kasboek $kasboek
 */
class KasboekIn extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kasboekin';

    /**
     * @var array
     */
    protected $fillable = ['omzkitchen', 'omzlaag', 'omzhoog', 'omzspacerent', 'omzvoucher', 'omzentry', 'omzparking', 'omzothers', 'omztotalin', 'omzexkitchen', 'omzexlaag', 'omzexhoog', 'omzexspacerent', 'omzexvoucher', 'omzexentry', 'omzexparking', 'omzexothers', 'omzextotalin', 'omzbtwkitchen', 'omzbtwlaag', 'omzbtwhoog', 'omzbtwspacerent', 'omzbtwvoucher', 'omzbtwentry', 'omzbtwparking', 'omzbtwothers', 'omzbtwtotalin'];

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
        return $this->hasOne('App\Models\Kasboek', 'in_id');
    }
}
