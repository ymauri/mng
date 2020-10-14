<?php

namespace App\Http\Controllers;

use App\Models\Source;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SourceController extends Controller
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
        return view('source.index');
    }

    /**
     * Source datatable
     * @param Request $request
     *
     * @return mixed
     */
    public function dt(Request $request)
    {
        $str = !empty($request->input('query')) ? $request->input('query')['name'] : "";
        $query = Source::query();
        if (!empty($str)) {
            $query->whereRaw("details LIKE '%$str%'")
                  ->orWhereRaw("guesty LIKE '%$str%'");
        }
        return datatables()->of($query)->make(true);
    }

    /**
     * Show form for adding new source
     * @return View
     */
    public function add()
    {
        return view('source.form');
    }

    /**
     * Create Source object
     * @param Request $request
     *
     * @return Response
     */
    public function create(Request $request)
    {
        try {
            $data = $request->validate([
                'guesty' => ['required', 'string', 'max:255'],
                'details' => ['required', 'string', 'max:255'],
            ]);
            $data['isactive'] = !empty($request->input('isactive'));
            $data['extrafield'] = !empty($request->input('extrafield'));
            Source::create($data);

            flash(__("Success. Source created."), 'success');
            return redirect(route('source.index'));

        } catch (Exception $e) {
            Log::error($e);
            flash($e->getMessage(), 'error');
            return back();
        }
    }

    /**
     * Delete source object
     *
     * @param Source $source
     *
     * @return Response
     */
    public function delete(Source $source)
    {
        try {
            $source->update(["isactive" =>  !$source->isactive ]);
            return response(["message" => "Success. Source has been disabled.", 'status' => "OK"], 200);
        } catch (Exception $e) {
            Log::error($e);
            return response(["message" => $e->getMessage(), "status" => 'ERROR'], 400);
        }
    }

    /**
     * Show edit worker view
     * @param Source $source
     *
     * @return View
     */
    public function edit(Source $source)
    {
        return view('source.form', compact('source'));
    }

    /**
     * Update source object
     * @param Request $request
     * @param Source $source
     *
     * @return Response
     */
    public function update(Request $request, Source $source)
    {
        try {
            $data = $request->validate([
                'guesty' => ['required', 'string', 'max:255'],
                'details' => ['required', 'string', 'max:255'],
            ]);
            $data['isactive'] = !empty($request->input('isactive'));
            $data['extrafield'] = !empty($request->input('extrafield'));

            $source->update($data);

            flash(__("Success. Source updated."), 'success');
            return redirect(route('source.index'));
        } catch (Exception $e) {
            Log::error($e);
            flash($e->getMessage(), 'error');
            return back();
        }
    }
}
