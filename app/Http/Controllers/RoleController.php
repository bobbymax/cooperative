<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::latest()->get();

        if ($roles->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found!'
            ], 404);
        }

        return response()->json([
            'data' => $roles,
            'status' => 'success',
            'message' => 'Roles list'
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'max_slots' => 'required|integer',
            'isSuper' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following error(s)!:'
            ], 500);
        }

        $role = Role::create([
            'name' => $request->name,
            'label' => Str::slug($request->name),
            'max_slots' => $request->max_slots,
            'start_date' => Carbon::parse($request->start_date),
            'expiry_date' => $request->expiry_date != null ? Carbon::parse($request->expiry_date) : null,
            'isSuper' => $request->isSuper,
            'cannot_expire' => $request->cannot_expire
        ]);

        if ($request->has('permissions')) {
            foreach($request->permissions as $value) {
                $permission = Permission::where('label', $value)->first();

                if ($permission) {
                    $role->grantPermission($permission);
                }
            }
        }

        return response()->json([
            'data' => $role,
            'status' => 'success',
            'message' => 'Role has been created successfully!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($role)
    {
        $role = Role::find($role);

        if (! $role) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid role id'
            ], 422);
        }

        return response()->json([
            'data' => $role,
            'status' => 'success',
            'message' => 'Role Details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($role)
    {
        $role = Role::find($role);

        if (! $role) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid role id'
            ], 422);
        }

        return response()->json([
            'data' => $role,
            'status' => 'success',
            'message' => 'Role Details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $role)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'max_slots' => 'required|integer',
            'isSuper' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following error(s)!:'
            ], 500);
        }

        $role = Role::find($role);

        if (! $role) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid role id'
            ], 422);
        }

        $role->update([
            'name' => $request->name,
            'label' => Str::slug($request->name),
            'max_slots' => $request->max_slots,
            'start_date' => Carbon::parse($request->start_date),
            'expiry_date' => $request->expiry_date != null ? Carbon::parse($request->expiry_date) : null,
            'isSuper' => $request->isSuper,
            'cannot_expire' => $request->cannot_expire
        ]);

        if ($request->has('permissions')) {
            foreach($request->permissions as $value) {
                $permission = Permission::where('label', $value)->first();

                if ($permission && ! in_array($permission->label, $role->permissions->pluck('label')->toArray())) {
                    $role->grantPermission($permission);
                }
            }
        }

        return response()->json([
            'data' => $role,
            'status' => 'success',
            'message' => 'Role updated successfully!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($role)
    {
        $role = Role::find($role);

        if (! $role) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid role id'
            ], 422);
        }

        $old = $role;
        $role->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Role deleted successfully!'
        ], 200);
    }
}
