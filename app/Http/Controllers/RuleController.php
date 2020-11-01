<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\Rule;

class RuleController extends Controller
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
        return view('rule.index');
    }

    /**
     * Rule datatable
     * @param Request $request
     *
     * @return mixed
     */
    public function dt(Request $request)
    {
        $query = Rule::all();
        return datatables()->of($query)->make(true);
    }

    /**
     * Show form for adding rule
     * @return View
     */
    public function add()
    {
        $listings = Listing::all();
        return view('rule.form', compact('listings'));
    }

    /**
     * Create user object
     * @param Request $request
     *
     * @return Response
     */
    public function create(Request $request)
    {
        try {
            // $data = $request->validate([
            //     'name' => ['required', 'string', 'max:128'],
            //     'details' => ['required', 'string', 'max:255'],
            //     'time' => ['required', 'time'],
            //     'active' => ['bool'],
            //     'action' => ['string'],
            //     'actionvalue' => ['string'],
            //     'condition' => ['string'],
            //     'conditionvalue' => ['string'],
            //     'begin' => ['date'],
            //     'ends' => ['date'],
            //     'unit' => ['string'],
            //     'daysahead' => ['int'],

            //     'role' => ['required', "integer"]
            // ]);

            Rule::create($request->all());
            flash(__("Success. Rule created."), 'success');
            return redirect(route('rule.index'));
        } catch (Exception $e) {
            Log::error($e);
            flash($e->getMessage(), 'error');
            return back();
        }
    }

    /**
     * Delete rule object
     *
     * @param Rule $rule
     *
     * @return Response
     */
    public function delete(Rule $rule)
    {
        try {
            $rule->delete();
            return response(["message" => "Success. User deleted.", 'status' => "OK"], 200);
        } catch (Exception $e) {
            Log::error($e);
            return response(["message" => $e->getMessage(), "status" => 'ERROR'], 400);
        }
    }

    /**
     * Show edit rule view
     * @param Rule $rule
     *
     * @return View
     */
    public function edit(Rule $rule)
    {
        $listings = Listing::all();
        return view('rule.form', compact('rule', 'listings'));
    }

    /**
     * Update rule object
     * @param Request $request
     * @param Rule $rule
     *
     * @return Response
     */
    public function update(Request $request, Rule $rule)
    {
        try {
            $rule->update($request->all());
            flash(__("Success. Rule updated."), 'success');
            return redirect(route('rule.index'));
        } catch (Exception $e) {
            Log::error($e);
            flash($e->getMessage(), 'error');
            return back();
        }
    }
}
