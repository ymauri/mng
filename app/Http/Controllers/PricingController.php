<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PricingController extends Controller
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
        $listings = Listing::all();
        return view('pricing.index', compact('listings'));
    }

}
