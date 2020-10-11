<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
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
        return view('role.index');
    }

    /**
     * Role datatable
     * @param Request $request
     *
     * @return mixed
     */
    public function dt(Request $request)
    {
        $str = !empty($request->input('query')) ? $request->input('query')['name'] : "";
        $query = Role::query();
        if (!empty($str)) {
            $query->whereRaw("name LIKE '%$str%'");
        }
        return datatables()->of($query)->make(true);
    }

    /**
     * Show form for adding role
     * @return View
     */
    public function add()
    {
        $permissions = Permission::all();
        return view('role.form', compact('permissions'));
    }

    /**
     * Create role object
     * @param Request $request
     *
     * @return Response
     */
    public function create(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'permissions' => ['required', "array"]
            ]);

            $role = Role::create(['name' => $data['name']]);
            $role->givePermissionTo($data['permissions']);

            flash(__("Success. Role created."), 'success');
            return redirect(route('role.index'));

        } catch (Exception $e) {
            Log::error($e);
            flash($e->getMessage(), 'error');
            return back();
        }
    }

    /**
     * Delete role object
     *
     * @param Role $role
     *
     * @return Response
     */
    public function delete(Role $role)
    {
        try {
            if (Auth::user()->roles()->first()->id != $role->id) {
                $role->delete();
                return response(["message" => "Success. Role deleted.", 'status' => "OK"], 200);
            } else {
                return response(["message" => "Warning. Role can't be deleted.", 'status' => "WARNING"], 200);
            }
        } catch (Exception $e) {
            Log::error($e);
            return response(["message" => $e->getMessage(), "status" => 'ERROR'], 400);
        }
    }

    /**
     * Show edit role view
     * @param Role $role
     *
     * @return View
     */
    public function edit(Role $role)
    {
        $currentPermissions = array_column($role->getAllPermissions()->toArray(), 'name');
        $permissions = Permission::all();
        return view('role.form', compact('role', 'permissions', 'currentPermissions'));
    }

    /**
     * Update role object
     * @param Request $request
     * @param Role $role
     *
     * @return Response
     */
    public function update(Request $request, Role $role)
    {
        try {
            $data = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'permissions' => ['required', "array"]
            ]);

            $role->name = $data['name'];
            $currentPermissions = array_column($role->getAllPermissions()->toArray(), 'name');
            $role->revokePermissionTo($currentPermissions);
            $role->givePermissionTo($data['permissions']);
            $role->save();

            flash(__("Success. Role updated."), 'success');
            return redirect(route('role.index'));
        } catch (Exception $e) {
            Log::error($e);
            flash($e->getMessage(), 'error');
            return back();
        }
    }
}
