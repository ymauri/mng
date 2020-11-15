<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
            $data = $request->validate($this->validatorArray());
            $data['active'] = isset($data['active']);
            Rule::create($data);
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
            $data = $request->validate($this->validatorArray());
            $data['active'] = isset($data['active']);
            $rule->update($data);
            flash(__("Success. Rule updated."), 'success');
            return redirect(route('rule.index'));
        } catch (Exception $e) {
            Log::error($e);
            flash($e->getMessage(), 'error');
            return back();
        }
    }

    /**
     * Returns validator array for Rule Model
     * @return mixed
     */
    private function validatorArray() {
        return [
            'active' => [''],
            'name' => ['required', 'string', 'max:255'],
            'details' => ['required', 'string', 'max:255'],
            'priority' => ['required', 'int'],
            'apartments' => [''],
            'cond' => ['required','string'],
            'conditionvalue' => ['required','int'],
            'ishook' => ['int'],
            'action' => ['string'],
            'actionvalue' => ['required','int'],
            'unit' => ['string'],
            'daysahead' => ['int'],
            'begin' => ['date'],
            'ends' => ['date'],
            'unit' => ['string'],
            'time' => ['string'],
            'dayweek' => ['']
        ];
    }
}
