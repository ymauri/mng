<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property float $maestro
 * @property float $alipay
 * @property float $visa
 * @property float $visaelec
 * @property float $mastercard
 * @property float $american
 * @property float $unionpay
 * @property float $diners
 * @property float $vpay
 * @property float $ccmaestro
 * @property float $ccalipay
 * @property float $ccvisa
 * @property float $ccvisaelec
 * @property float $ccmastercard
 * @property float $ccamerican
 * @property float $ccunion
 * @property float $ccdiners
 * @property float $ccvpay
 * @property float $total
 * @property float $totalcc
 * @property float $profit
 * @property float $tcredit
 * @property float $tdebit
 * @property boolean $iscc
 * @property float $cctcredit
 * @property float $cctdebit
 * @property float $exmaestro
 * @property float $exvisa
 * @property float $exvisaelec
 * @property float $exmastercard
 * @property float $examerican
 * @property float $exunionpay
 * @property float $exdiners
 * @property float $exvpay
 * @property float $extotal
 * @property Cashclosure $cashclosure
 * @property Hotel $hotel
 * @property Reception $reception
 * @property Skybar $skybar
 */
class Card extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'card';

    /**
     * @var array
     */
    protected $fillable = ['maestro', 'alipay', 'visa', 'visaelec', 'mastercard', 'american', 'unionpay', 'diners', 'vpay', 'ccmaestro', 'ccalipay', 'ccvisa', 'ccvisaelec', 'ccmastercard', 'ccamerican', 'ccunion', 'ccdiners', 'ccvpay', 'total', 'totalcc', 'profit', 'tcredit', 'tdebit', 'iscc', 'cctcredit', 'cctdebit', 'exmaestro', 'exvisa', 'exvisaelec', 'exmastercard', 'examerican', 'exunionpay', 'exdiners', 'exvpay', 'extotal'];

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
    public function cashclosure()
    {
        return $this->hasOne('App\Models\Cashclosure', 'card_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hotel()
    {
        return $this->hasOne('App\Models\Hotel', 'card_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reception()
    {
        return $this->hasOne('App\Models\Reception', 'card_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function skybar()
    {
        return $this->hasOne('App\Models\Skybar', 'card_id');
    }
}
