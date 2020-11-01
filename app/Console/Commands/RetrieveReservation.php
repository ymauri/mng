<?php

namespace App\Console\Commands;

use App\Services\ReservationService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class RetrieveReservation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'retrieve:reservation {date?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets reservations from guesty';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ReservationService $service)
    {
        $date = !empty($this->argument('date')) ? $this->argument('date') : Carbon::now()->format("Y-m-d");
        $service->retrieve($date);
    }
}
