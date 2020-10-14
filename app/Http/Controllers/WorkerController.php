<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WorkerController extends Controller
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
        return view('worker.index');
    }

    /**
     * Staff datatable
     * @param Request $request
     *
     * @return mixed
     */
    public function dt(Request $request)
    {
        $str = !empty($request->input('query')) ? $request->input('query')['name'] : "";
        $query = Worker::where("isactive", 1);
        if (!empty($str)) {
            $query->whereRaw("name LIKE '%$str%'")
                  ->orWhereRaw("position LIKE '%$str%'");
        }
        return datatables()->of($query)->make(true);
    }

    /**
     * Show form for adding worker
     * @return View
     */
    public function add()
    {
        return view('worker.form');
    }

    /**
     * Create worker object
     * @param Request $request
     *
     * @return Response
     */
    public function create(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'position' => ['required', "string"]
            ]);
            $data['isactive'] = true;
            Worker::create($data);

            flash(__("Success. Staff member created."), 'success');
            return redirect(route('staff.index'));

        } catch (Exception $e) {
            Log::error($e);
            flash($e->getMessage(), 'error');
            return back();
        }
    }

    /**
     * Delete worker object
     *
     * @param Worker $worker
     *
     * @return Response
     */
    public function delete(Worker $worker)
    {
        try {
            $worker->update(["isactive" => false]);
            return response(["message" => "Success. Staff member has been disabled.", 'status' => "OK"], 200);
        } catch (Exception $e) {
            Log::error($e);
            return response(["message" => $e->getMessage(), "status" => 'ERROR'], 400);
        }
    }

    /**
     * Show edit worker view
     * @param Worker $worker
     *
     * @return View
     */
    public function edit(Worker $worker)
    {
        return view('worker.form', compact('worker'));
    }

    /**
     * Update worker object
     * @param Request $request
     * @param Worker $worker
     *
     * @return Response
     */
    public function update(Request $request, Worker $worker)
    {
        try {
            $data = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'position' => ['required', "string"]
            ]);
            $data['isactive'] = !empty($request->input('isactive'));

            $worker->update($data);

            flash(__("Success. Staff member updated."), 'success');
            return redirect(route('staff.index'));
        } catch (Exception $e) {
            Log::error($e);
            flash($e->getMessage(), 'error');
            return back();
        }
    }
}
