<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HotelController extends Controller
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
        return view('hotel.index');
    }

    /**
     * Hotel datatable
     * @param Request $request
     *
     * @return mixed
     */
    public function dt(Request $request)
    {
        $str = Carbon::now();
        if (!empty($request->input('query'))) {
            $str = Carbon::createFromFormat('m-Y', $request->input('query')['name']);
        }
        $str = $str->format('Y-m');
        $query = Hotel::query()->whereRaw("dated LIKE '$str%'")->orderBy('dated', 'desc');
        return datatables()->of($query)->make(true);
    }

}
