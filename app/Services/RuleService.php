<?php

namespace App\Services;

use App\Models\Listing;
use App\Models\ListingCalendar;
use App\Models\Rule;
use App\Noms\Status;
use App\Repositories\RuleRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

/**
 * RuleService allows manage rule functionlities
 */
class RuleService
{
    private $api;
    private $repository;

    public function __construct(RuleRepository $repository)
    {
        $this->api = new GuestyService();
        $this->repository = $repository;
    }

    /**
     * Register candidates listing calendars will be modified in rule
     *
     * @param Carbon $checkin
     * @param Carbon $checkout
     * @param Rule $rule
     * @param mixed $reservation
     *
     * @return void
     */
    public function registerAffectedCalendar(Carbon $checkin, Carbon $checkout, Rule $rule, array $reservation)
    {
        if (count($rule->apartments) > 0) {
            $fullListings = Listing::whereIn('idguesty', $rule->apartments);
        } else {
            $fullListings = Listing::query();
        }

        $calendars = [];
        $prices = new Collection();
        $fullListings->chunk(10, function ($listings) use (&$calendars, &$prices, $checkin, $checkout) {
            $guestyIds = $listings->pluck('idguesty')->toArray();
            $chunkCalendars = $this->api->listingCalendar($checkin->format('Y-m-d'), $checkout->format('Y-m-d'), $guestyIds);
            $calendars = array_merge($calendars, $chunkCalendars);
            $prices = $prices->merge($listings);
        });

        $filterCalendars = $this->filterCalendarBy($calendars, ['status' => strtolower(Status::AVAILABLE)]);
        foreach ($filterCalendars as $calendar) {
            // Almacenar los calendarios que pueden afectarse con la ejecución del hook.
            $calendar['_id'] = $calendar['listingId'].str_replace("-", "", $calendar['date']);
            $this->saveListingCalendar($calendar, $rule, $reservation['_id'], $prices);
        }
    }

    /**
     * Get formated array of listings
     * @param int $limit
     * @param int $offset
     * @param mixed filter ['type' => ['Studio'], 'idguesty' => []]
     *
     * @return mixed
     */
    public function getFormatedListing($limit, $offset, $filter = null)
    {
        $listings = $this->em->getRepository('RestaurantBundle:Listing')->getListingBy($limit, $offset);
        $result = [];
        if (!empty($filter) && (!empty($filter['type']) || !empty($filter['idguesty']))) {
            foreach ($listings as $listing) {
                if (!empty($filter['type']) && count($filter['type']) > 0) {
                    foreach ($filter['type']  as $type) {
                        if (in_array($type, $listing['type'])) {
                            $result[] =  $listing;
                        }
                    }
                } else if (!empty($filter['idguesty']) && count($filter['idguesty']) > 0) {
                    foreach ($filter['idguesty']  as $idguesty) {
                        if ($idguesty == $listing['idguesty']) {
                            $result[] =  $listing;
                        }
                    }
                }
            }
            return array_column($result, 'idguesty');
        }
        return array_column($listings, 'idguesty');
    }

    /**
     * Get guesty available listing by date
     */
    public function getGuestyCalendarDetails($idsListingGuesty, $startDate, $endDate)
    {
        $guestyCalendar = $this->api->listingCalendar($startDate, $endDate, $idsListingGuesty);
        if ($guestyCalendar['status'] == 200 && count($guestyCalendar['result']) > 0) {
            return $guestyCalendar['result'];
        }
        return [];
    }

    /**
     * Filter guesty calendar by status
     * @param mixed listingCalendar formated as guesty object
     * @param mixed filter ['status' => 'available']
     *
     * @return mixed
     */
    public function filterCalendarBy($listingCalendar, $filter)
    {
        $result = [];
        foreach ($listingCalendar as $calendar) {
            if (!empty($filter['status']) && $calendar['status'] == $filter['status']) {
                $result[] = $calendar;
            }
        }
        return $result;
    }

    /**
     * Register listing calendar
     * @param array calendar formated as guesty object
     * @param Rule rule
     * @param string reservationId
     * @param Collection prices
     */
    public function saveListingCalendar(array $calendar, Rule $rule, string $reservationId, Collection $prices)
    {
        $listingCalendar = ListingCalendar::where('idcalendar', $calendar["_id"])->where('reservation', $reservationId)->first();
        if (empty($listingCalendar)) {
            $newprice = $this->calculatePrice($rule, $calendar, $prices);
            $ruleData = json_encode([
                            'condition' => $rule->cond,
                            'value'     => $rule->conditionvalue,
                            'action'    => $rule->action
                        ]);

            ListingCalendar::create([
                'idcalendar'        => $calendar["_id"],
                'checkin'           => $calendar['date'],
                'status'            => $calendar['status'],
                'price'             => $calendar['price'],
                'listing'           => $calendar['listingId'],
                'reservation'       => $reservationId,
                'rule'              => $ruleData,
                'newprice'          => $newprice
                // 'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
                // 'created_at'        => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }


    /**
     * Get price to be changed in gesty
     * @param Rule rule
     * @param array calendar formated as guesty object
     * @param Collection prices
     */
    public function calculatePrice($rule, $calendar, Collection $prices)
    {
        //Obtener los valores de máximos y mínimos para cada uno de los deptos implicados en la regla.
        $listing = $prices->firstWhere('idguesty', $calendar['listingId']);
        $max = $listing->maxprice;
        $min = $listing->minprice;
        $newprice = ($rule->unit == 'euro') ? ($rule->actionvalue) : (($calendar['price'] * $rule->actionvalue) / 100);
        //Verificar cuál es la acción que se va a realizar en la regla.
        switch ($rule->action) {
            case 'listing_change_price':
                if ($newprice > $max) $newprice = $max;
                if ($newprice < $min) $newprice = $min;
                break;
            case 'listing_lower_price':
                $newprice = (($calendar['price'] - $newprice) <= $min) ? $min : ($calendar['price'] - $newprice);
                break;
            case 'listing_raise_price':
                $newprice = (($calendar['price'] + $newprice) >= $max) ? $max : $calendar['price'] + $newprice;
                break;
        }
        return (int) $newprice;
    }

    /**
     * Update reservations in guesty. Rule type: Hook.
     */
    public function updateReservationHook()
    {
        $pendingGrouped = $this->em->getRepository("RestaurantBundle:ListingCalendar")->notAppliedGroups();
        $arrayCalendars = [];
        foreach ($pendingGrouped as $item) {
            if ($this->evaluateRuleCondition($item['rule'], $item['qty'])) {
                $calendarForUpdate = $this->em->getRepository("RestaurantBundle:ListingCalendar")->calendarsByDateAndReservation($item['checkin'], $item['reservation']);
                $arrayCalendars = $this->formatArrayToSend($calendarForUpdate);
            }
        }
        return $arrayCalendars;
    }

    private function evaluateRuleCondition($condition, $availables)
    {
        $availables = (int) $availables;
        $condition['value'] = (int) $condition['value'];
        switch ($condition['condition']) {
            case "listing_available_less":
                if ($availables <= $condition['value']) {
                    return true;
                }
                break;
            case "listing_available_more":
                if ($availables >= $condition['value']) {
                    return true;
                }
                break;
            case "none_condition":
                return true;
        }
        return false;
    }

    private function formatArrayToSend($calendars)
    {
        $dataForMail = $ids = [];
        foreach ($calendars as $calendar) {
            $item = [
                "listings" => $calendar->getListing(),
                "from" => $calendar->getCheckin()->format('Y-m-d'),
                "to" => $calendar->getCheckin()->format('Y-m-d'),
                "price" => $calendar->getNewprice(),
                "note" => 'Hook'
            ];
            $result = $this->api->setListingCalendar($item);
            if ($result['status'] == 200) {
                $ids[] = $calendar->getId();
                $listing = $this->em->getRepository('RestaurantBundle:Listing')->findOneBy(['idguesty' => $calendar->getListing()]);
                $dataForMail[] = [
                    'listing'   => $listing->getNumber(),
                    'date'      => $calendar->getCheckin()->format('Y-m-d'),
                    'oldprice'  => $calendar->getPrice(),
                    'price'     => $calendar->getNewprice(),
                    'status'    => 200
                ];
            }
        }
        if (count($ids) > 0) {
            $this->em->getRepository("RestaurantBundle:ListingCalendar")->setAppliedCalendar($ids);
        }
        return $dataForMail;
    }

    /**
     * Update calendar list on canceled rule
     *
     * @param mixed reservation
     * @return mixed
     */
    public function rollback($reservation)
    {
        $listingsAffected = $this->em->getRepository("RestaurantBundle:ListingCalendar")->findBy(['reservation' => $reservation['_id']]);
        $calendars = $emailData = [];
        $result = null;

        foreach ($listingsAffected as $calendar) {
            $calendars[] = [
                "listingId" => $calendar->getListing(),
                'from'      => $calendar->getCheckin()->format("Y-m-d"),
                'to'        => $calendar->getCheckin()->format("Y-m-d"),
                'price'     => $calendar->getPrice(),
                'note'      => 'Rollback'
            ];
            $listing = $this->em->getRepository("RestaurantBundle:Listing")->findOneBy(['idguesty' => $calendar->getListing()]);
            $emailData[] = [
                "listing"   => $listing->getNumber(),
                'date'      => $calendar->getCheckin()->format("Y-m-d"),
                'oldprice'  => $calendar->getNewprice(),
                'price'     => $calendar->getPrice()
            ];
        }

        if (count($calendars) > 0) {
            $result = $this->api->setListingCalendar(json_encode($calendars));
        }
        return isset($result['status']) && $result['status'] == 200 ?  $emailData : [];
    }

    /**
     * Executes all active rule
     * @param mixed $reservation
     * @return void
     */
    public function execute(array $reservation)
    {
        $activeRules = $this->repository->activeRules();
        foreach ($activeRules as $rule) {
            if ($rule->ishook) {
                $this->changePriceHook($rule, $reservation);
            } else {
                $this->changePriceCronJob($rule, $reservation);
            }
        }
    }

    /**
     * Update price by rule type CronJob
     * @param Rule $rule
     * @param array $reservation
     *
     * @return void
     */
    private function changePriceCronJob(Rule $rule, array $reservation)
    {
    }


    /**
     * Update price by rule type Hook
     * @param Rule $rule
     * @param array $reservation
     *
     * @return void
     */
    private function changePriceHook(Rule $rule, array $reservation)
    {
        $checkin = Carbon::parse($reservation['checkIn']);
        $checkout = Carbon::parse($reservation['checkOut']);
        $beginOfRule = $rule->daysahead > 0 ? Carbon::now()->addDays($rule->daysahead) : Carbon::now();
        if ($checkin > $beginOfRule) {
            while ($checkin < $checkout) {
                //Check week days
                if (in_array($checkin->format('w'), $rule->dayweek) || count($rule->dayweek) == 0) {
                    //Get listing calendars day by day
                    $this->registerAffectedCalendar($checkin, $checkin, $rule, $reservation);
                }
                $checkin->addDay();
            }
        }
    }
}
