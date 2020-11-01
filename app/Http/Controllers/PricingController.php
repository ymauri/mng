<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Services\GuestyService;
use App\Services\PricingService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PricingController extends Controller
{
    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PricingService $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $listings = Listing::all();
        return view('pricing.index', compact('listings'));
    }

    /**
     * Get reservation data from guesty
     * @param Request $request
     *
     * @return View
     */
    public function filter(Request $request)
    {
        $dates = $request->input('daterange');
        $dates = explode(' to ', $dates);

        $weekdays = !empty($request->input('weekdays')) ? $request->input('weekdays') : [];
        $listings = !empty($request->input('listings')) ? $request->input('listings') : [];

        $calendars = $this->service->filterCalendar($dates[0], $dates[1], $weekdays, $listings);
        if (count($calendars) > 0) {
            return view('pricing.info', compact('calendars'));
        }
        return view('pricing.no-info');
    }

    /**
     * Update data on guesty platform
     * @param Request $request
     *
     * @return Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        try {
            if ($this->service->update($data)) {
                return response(["message" => "Success. Prices were updated on Guesty platform.", 'status' => "OK"], 200);
            } else {
                return response(["message" => "Warning. No one price were updated.", 'status' => "WARNING"], 200);
            }
        } catch (Exception $e) {
            Log::error($e);
            return response(["message" => $e->getMessage(), "status" => 'ERROR'], 400);
        }
    }
}
