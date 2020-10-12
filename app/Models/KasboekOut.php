<?php

namespace App\Models;

use App\Models;

/**
 * @property int $id
 * @property float $pinccv
 * @property float $creditcards
 * @property float $rekening
 * @property float $voorverkoop
 * @property float $kadopagina
 * @property float $tickets
 * @property float $belevenissen
 * @property float $cash
 * @property float $inkoopfood
 * @property float $exinkoopfood
 * @property float $btwinkoopfood
 * @property float $bedrijfskleding
 * @property float $exbedrijfskleding
 * @property float $btwbedrijfskleding
 * @property float $kleineinv
 * @property float $exkleineinv
 * @property float $btwkleineinv
 * @property float $was
 * @property float $exwas
 * @property float $btwwas
 * @property float $bankkosten
 * @property float $entertainment
 * @property float $exentertainment
 * @property float $btwentertainment
 * @property float $diversekosten
 * @property float $exdiversekosten
 * @property float $btwdiversekosten
 * @property float $totalout
 * @property float $extotalout
 * @property float $btwtotalout
 * @property float $saldo
 * @property Kasboek $kasboek
 */
class KasboekOut extends Models
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'kasboekout';

    /**
     * @var array
     */
    protected $fillable = ['pinccv', 'creditcards', 'rekening', 'voorverkoop', 'kadopagina', 'tickets', 'belevenissen', 'cash', 'inkoopfood', 'exinkoopfood', 'btwinkoopfood', 'bedrijfskleding', 'exbedrijfskleding', 'btwbedrijfskleding', 'kleineinv', 'exkleineinv', 'btwkleineinv', 'was', 'exwas', 'btwwas', 'bankkosten', 'entertainment', 'exentertainment', 'btwentertainment', 'diversekosten', 'exdiversekosten', 'btwdiversekosten', 'totalout', 'extotalout', 'btwtotalout', 'saldo'];

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
        return $this->hasOne('App\Models\Kasboek', 'out_id');
    }
}
