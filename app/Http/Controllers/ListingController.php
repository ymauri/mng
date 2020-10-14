<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ListingController extends Controller
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
        return view('listing.index');
    }

    /**
     * Listing datatable
     * @param Request $request
     *
     * @return mixed
     */
    public function dt(Request $request)
    {
        $str = !empty($request->input('query')) ? $request->input('query')['name'] : "";
        $query = Listing::query();
        if (!empty($str)) {
            $query->whereRaw("details LIKE '%$str%'")
                  ->orWhereRaw("value LIKE '%$str%'");
        }
        return datatables()->of($query)->make(true);
    }

    /**
     * Show form for adding new source
     * @return View
     */
    public function add()
    {
        return view('listing.form');
    }

    /**
     * Create Listing object.
     * @param Request $request
     *
     * @return Response
     */
    public function create(Request $request)
    {
        try {
            $data = $request->validate([
                'details' => ['required', 'string', 'max:255'],
                'value' => ['required', 'integer'],
                'maxprice' => ['required', 'integer'],
                'minprice' => ['required', 'integer'],
            ]);
            $data['activeforrent'] = !empty($request->input('activeforrent'));
            Listing::create($data);

            flash(__("Success. Listing created."), 'success');
            return redirect(route('listing.index'));

        } catch (Exception $e) {
            Log::error($e);
            flash($e->getMessage(), 'error');
            return back();
        }
    }

    /**
     * Delete source object
     *
     * @param Listing $listing
     *
     * @return Response
     */
    public function delete(Listing $listing)
    {
        try {
            $listing->update(["isactive" =>  !$listing->isactive ]);
            return response(["message" => "Success. Listing has been disabled.", 'status' => "OK"], 200);
        } catch (Exception $e) {
            Log::error($e);
            return response(["message" => $e->getMessage(), "status" => 'ERROR'], 400);
        }
    }

    /**
     * Show edit listing view
     * @param Listing $listing
     *
     * @return View
     */
    public function edit(Listing $listing)
    {
        return view('listing.form', compact('listing'));
    }

    /**
     * Update source object
     * @param Request $request
     * @param Listing $listing
     *
     * @return Response
     */
    public function update(Request $request, Listing $listing)
    {
        try {
            $data = $request->validate([
                'details' => ['required', 'string', 'max:255'],
                'value' => ['required', 'integer'],
                'maxprice' => ['required', 'integer'],
                'minprice' => ['required', 'integer'],
            ]);
            $data['activeforrent'] = !empty($request->input('activeforrent'));

            $listing->update($data);

            flash(__("Success. Listing updated."), 'success');
            return redirect(route('listing.index'));
        } catch (Exception $e) {
            Log::error($e);
            flash($e->getMessage(), 'error');
            return back();
        }
    }
}
