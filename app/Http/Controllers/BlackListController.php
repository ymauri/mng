<?php

namespace App\Http\Controllers;

use App\Models\BlackList;
use App\Models\Listing;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlackListController extends Controller
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
        return view('blacklist.index');
    }

    /**
     * BlackList datatable
     * @param Request $request
     *
     * @return mixed
     */
    public function dt(Request $request)
    {
        $str = !empty($request->input('query')) ? $request->input('query')['name'] : "";
        $query = BlackList::with('listing');
        if (!empty($str)) {
            $query->whereRaw("name LIKE '%$str%'")
                  ->orWhereRaw("email LIKE '%$str%'")
                  ->orWhereRaw("phone LIKE '%$str%'");
        }
        return datatables()->of($query->orderBy('id', 'desc'))->make(true);
    }

    /**
     * Show form for adding new blacklist
     * @return View
     */
    public function add()
    {
        $listings = Listing::all();
        return view('blacklist.form', compact('listings'));
    }

    /**
     * Create BlackList object
     * @param Request $request
     *
     * @return Response
     */
    public function create(Request $request)
    {
        try {
            $data = $request->validate([
                'listing_id' => ['required', 'integer', 'exists:listing,id'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email'],
                'checkin' => ['required', 'date'],
                'phone' => ['integer'],
            ]);
            $data['details'] = $request->input('details');
            BlackList::create($data);

            flash(__("Success. BlackList item created."), 'success');
            return redirect(route('blacklist.index'));

        } catch (Exception $e) {
            Log::error($e);
            flash($e->getMessage(), 'error');
            return back();
        }
    }

    /**
     * Delete blacklist object
     *
     * @param BlackList $blacklist
     *
     * @return Response
     */
    public function delete(BlackList $blacklist)
    {
        try {
            $blacklist->delete();
            return response(["message" => "Success. BlackList item has been removed.", 'status' => "OK"], 200);
        } catch (Exception $e) {
            Log::error($e);
            return response(["message" => $e->getMessage(), "status" => 'ERROR'], 400);
        }
    }

    /**
     * Show edit worker view
     * @param BlackList $blacklist
     *
     * @return View
     */
    public function edit(BlackList $blacklist)
    {
        $listings = Listing::all();
        return view('blacklist.form', compact('blacklist', 'listings'));
    }

    /**
     * Update blacklist object
     * @param Request $request
     * @param BlackList $blacklist
     *
     * @return Response
     */
    public function update(Request $request, BlackList $blacklist)
    {
        try {
            // dd($request->all());
            $data = $request->validate([
                'listing_id' => ['required', 'exists:listing,id'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email'],
                'checkin' => ['required'],
                'phone' => ['integer'],
            ]);
            $data['details'] = $request->input('details');
            $blacklist->update($data);

            flash(__("Success. BlackList item updated."), 'success');
            return redirect(route('blacklist.index'));
        } catch (Exception $e) {
            Log::error($e);
            flash($e->getMessage(), 'error');
            return back();
        }
    }
}
