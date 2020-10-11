<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
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
        return view('user.index');
    }

    /**
     * User datatable
     * @param Request $request
     *
     * @return mixed
     */
    public function dt(Request $request)
    {
        $str = !empty($request->input('query')) ? $request->input('query')['name'] : "";
        $query = User::select(
            'id',
            'name',
            'email',
            DB::raw("CASE WHEN (id = " . Auth::user()->id . ") THEN 1 ELSE 0 END AS disabled")
        );
        if (!empty($str)) {
            $query->whereRaw("name LIKE '%$str%'")
                ->orWhereRaw("email LIKE '%$str%'");
        }
        return datatables()->of($query)->make(true);
    }

    /**
     * Show form for adding user
     * @return View
     */
    public function add()
    {
        $roles = Role::all();
        return view('user.form', compact('roles'));
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
            $data = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'role' => ['required', "integer"]
            ]);

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            $role = Role::findById($data['role']);
            $user->assignRole($role->name);

            flash(__("Success. User created."), 'success');
            return redirect(route('user.index'));
        } catch (Exception $e) {
            Log::error($e);
            flash($e->getMessage(), 'error');
            return back();
        }
    }

    /**
     * Delete user object
     *
     * @param User $user
     *
     * @return Response
     */
    public function delete(User $user)
    {
        try {
            if ($user->id != Auth::user()->id) {
                $user->delete();
                return response(["message" => "Success. User deleted.", 'status' => "OK"], 200);
            } else {
                return response(["message" => "Warning. User can't be deleted.", 'status' => "WARNING"], 200);
            }
        } catch (Exception $e) {
            Log::error($e);
            return response(["message" => $e->getMessage(), "status" => 'ERROR'], 400);
        }
    }

    /**
     * Show edit user view
     * @param User $user
     *
     * @return View
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('user.form', compact('user', 'roles'));
    }

    /**
     * Update user object
     * @param Request $request
     * @param User $user
     *
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        try {
            $data = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['nullable', 'string', 'min:8', 'confirmed'],
                'role' => ['required', "integer"]
            ]);
            $user->name = $data['name'];
            $user->email = $data['email'];
            if (isset($data['password'])) {
                $user->password = Hash::make($data['password']);
            }
            $user->save();
            if (Auth::user()->id != $user->id) {
                $oldRole = $user->roles()->first();
                $user->removeRole($oldRole->name);

                $currentRole = Role::findById((int) $data['role']);
                $user->assignRole($currentRole->name);
            }

            flash(__("Success. User updated."), 'success');
            return redirect(route('user.index'));
        } catch (Exception $e) {
            Log::error($e);
            flash($e->getMessage(), 'error');
            return back();
        }
    }
}
