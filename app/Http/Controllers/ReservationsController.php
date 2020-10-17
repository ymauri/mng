<?php

namespace App\Http\Controllers;

use App\Models\Checkin;
use App\Models\Checkout;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReservationsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('reservations.index');
    }

    /**
     * Checkin datatable
     * @param Request $request
     *
     * @return mixed
     */
    public function dt(Request $request)
    {
        $str = !empty($request->input('query')) ? $request->input('query')['name'] : "";
        $date = !empty($request->input('query')) ? $request->input('query')['date'] : "";
        $query = Checkin::with('checkout', 'listing')->orderBy('time', 'desc');
        if (!empty($str)) {
            $query->whereRaw("name LIKE '%$str%'");
            $query->orWhereRaw("phone LIKE '%$str%'");
            $query->orWhereRaw("email LIKE '%$str%'");
        }
        if (!empty($date)) {
            $query->whereRaw("label LIKE '%$str%'");
        }
        return datatables()->of($query)->make(true);
    }

    /**
     * Show edit parameters view
     * @param Checkin $checkin
     *
     * @return View
     */
    public function show(Checkin $checkin)
    {
        $checkout = Checkout::where('confcode', $checkin->confcode)->get();
        return view('reservations.show', compact('checkin', 'checkout'));
    }

}
