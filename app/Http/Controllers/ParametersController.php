<?php

namespace App\Http\Controllers;

use App\Models\Parameters;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;

class ParametersController extends Controller
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
        return view('parameters.index');
    }

    /**
     * Parameters datatable
     * @param Request $request
     *
     * @return mixed
     */
    public function dt(Request $request)
    {
        $str = !empty($request->input('query')) ? $request->input('query')['name'] : "";
        $query = Parameters::query();
        if (!empty($str)) {
            $query->whereRaw("label LIKE '%$str%'");
        }
        return datatables()->of($query)->make(true);
    }

    /**
     * Show form for adding parameters
     * @return View
     */
    public function add()
    {
        $permissions = Parameters::all();
        return view('parameters.form', compact('permissions'));
    }

    /**
     * Create parameters object
     * @param Request $request
     *
     * @return Response
     */
    public function create(Request $request)
    {
        try {
            $data = $request->validate([
                'variable' => ['required'],
                'valstring' => ['required'],
                'label' => ['required']
            ]);

            Parameters::create($data);

            flash(__("Success. Parameter created."), 'success');
            return redirect(route('parameters.index'));

        } catch (Exception $e) {
            Log::error($e);
            flash($e->getMessage(), 'error');
            return back();
        }
    }

    /**
     * Delete parameters object
     *
     * @param Parameters $parameters
     *
     * @return Response
     */
    public function delete(Parameters $parameters)
    {
        try {
            $parameters->delete();
            return response(["message" => "Success. Parameter deleted.", 'status' => "OK"], 200);
        } catch (Exception $e) {
            Log::error($e);
            return response(["message" => $e->getMessage(), "status" => 'ERROR'], 400);
        }
    }

    /**
     * Show edit parameters view
     * @param Parameters $parameters
     *
     * @return View
     */
    public function edit(Parameters $parameters)
    {
        return view('parameters.form', compact('parameters'));
    }

    /**
     * Update parameters object
     * @param Request $request
     * @param Parameters $parameters
     *
     * @return Response
     */
    public function update(Request $request, Parameters $parameters)
    {
        try {
            $data = $request->validate([
                'variable' => ['required'],
                'valstring' => ['required'],
                'label' => ['required']
            ]);

            $parameters->update($data);

            flash(__("Success. Parameter updated."), 'success');
            return redirect(route('parameters.index'));
        } catch (Exception $e) {
            Log::error($e);
            flash($e->getMessage(), 'error');
            return back();
        }
    }
}
