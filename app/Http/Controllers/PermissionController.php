<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PermissionController extends Controller
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
        $permissions = Permission::latest()->get();

        if ($permissions->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found!'
            ], 200);
        }

        return response()->json([
            'data' => $permissions,
            'status' => 'success',
            'message' => 'Permissions list'
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
            'name' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following error(s)!:'
            ], 500);
        }

        $permission = Permission::create([
            'name' => $request->name,
            'key' => Str::slug($request->name),
            'module' => isset($request->module) ? $request->module : null
        ]);

        return response()->json([
            'data' => $permission,
            'status' => 'success',
            'message' => 'Permission has been created successfully!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show($permission)
    {
        $permission = Permission::find($permission);

        if (! $permission) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid permission id'
            ], 422);
        }

        return response()->json([
            'data' => $permission,
            'status' => 'success',
            'message' => 'Permission Details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($permission)
    {
        $permission = Permission::find($permission);

        if (! $permission) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid permission id'
            ], 422);
        }

        return response()->json([
            'data' => $permission,
            'status' => 'success',
            'message' => 'Permission Details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $permission)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following error(s)!:'
            ], 500);
        }

        $permission = Permission::find($permission);

        if (! $permission) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid permission id'
            ], 422);
        }

        $permission->update([
            'name' => $request->name,
            'key' => Str::slug($request->name),
            'module' => isset($request->module) ? $request->module : null
        ]);

        return response()->json([
            'data' => $permission,
            'status' => 'success',
            'message' => 'Permission updated successfully!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($permission)
    {
        $permission = Permission::find($permission);

        if (! $permission) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid permission id'
            ], 422);
        }

        $old = $permission;
        $permission->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Permission deleted successfully!'
        ], 200);
    }
}
