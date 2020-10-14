<?php

namespace App\Http\Controllers;

use App\Models\Checkin;
use App\Models\Checkout;
use App\Models\Help;
use App\Models\Hotel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HelpController extends Controller
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
        return view('help.index');
    }

    /**
     * Help content datatable
     * @param Request $request
     *
     * @return mixed
     */
    public function dt(Request $request)
    {
        $str = !empty($request->input('query')) ? $request->input('query')['name'] : "";
        $query = Help::query();
        if (!empty($str)) {
            $query->whereRaw("field LIKE '%$str%'")
                  ->orWhereRaw("form LIKE '%$str%'");
        }
        return datatables()->of($query)->make(true);
    }

    /**
     * Show form for adding help content
     * @return View
     */
    public function add()
    {
        $helpFields = Help::whereIn('field', array_keys(config('forms.hotel.help')))->get()->pluck('field')->toArray();
        $configFields = array_keys(config('forms.hotel.help'));
        $fields = array_diff($configFields, $helpFields);
        if (count($fields) > 0) {
            return view('help.form', compact('fields'));
        } else {
            flash('There is not another field without help content.', 'warning');
            return redirect(route('help.index'));
        }
    }

    /**
     * Create help content object
     * @param Request $request
     *
     * @return Response
     */
    public function create(Request $request)
    {
        try {
            $data = $request->validate([
                'form' => ['required', 'string', 'max:255'],
                'content' => ['required', 'string', 'max:255'],
                'field' => ['required', 'string', 'max:255'],
            ]);

            Help::create($data);

            flash(__("Success. Help content created."), 'success');
            return redirect(route('help.index'));

        } catch (Exception $e) {
            Log::error($e);
            flash($e->getMessage(), 'error');
            return back();
        }
    }

    /**
     * Delete help content object
     *
     * @param Help $help
     *
     * @return Response
     */
    public function delete(Help $help)
    {
        try {
            $help->delete();
            return response(["message" => "Success. Help content has been removed.", 'status' => "OK"], 200);
        } catch (Exception $e) {
            Log::error($e);
            return response(["message" => $e->getMessage(), "status" => 'ERROR'], 400);
        }
    }

    /**
     * Show edit help content view
     * @param Help $help
     *
     * @return View
     */
    public function edit(Help $help)
    {
        $fieldNames = config('forms.hotel.help');
        unset($fieldNames[$help->field]);
        $fields = Help::whereNotIn('field', array_keys($fieldNames))->get()->pluck('field');
        return view('help.form', compact('help', 'fields'));
    }

    /**
     * Update help content object
     * @param Request $request
     * @param Help $help
     *
     * @return Response
     */
    public function update(Request $request, Help $help)
    {
        try {
            $data = $request->validate([
                'form' => ['required', 'string', 'max:255'],
                'content' => ['required', 'string', 'max:255'],
                'field' => ['required', 'string', 'max:255']
            ]);

            $help->update($data);

            flash(__("Success. Help content updated."), 'success');
            return redirect(route('help.index'));
        } catch (Exception $e) {
            Log::error($e);
            flash($e->getMessage(), 'error');
            return back();
        }
    }
}
