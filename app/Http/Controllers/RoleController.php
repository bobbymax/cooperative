<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

/**
     * @OA\Post(
     * path="/roles",
     *   tags={"Roles"},
     *   summary="Save user role",
     *   operationId="roles",
     *
     *
     *   @OA\Parameter(
     *      name="name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="max_slots",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="integer"
     *      )
     * ),
     * @OA\Parameter(
     *      name="start_date",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="date"
     *      )
     * ),
     * @OA\Parameter(
     *      name="expiry_date",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="date"
     *      )
     * ),
     * @OA\Parameter(
     *      name="cannot_expire",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="boolean"
     *      )
     * ),
     * @OA\Parameter(
     *      name="permissions",
     *      description="A checkbox of permissions",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="list"
     *      )
     * ),
     *      @OA\Parameter(
     *      name="isSuper",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="boolean"
     *      )
     * ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="Page Not Found. If error persists, contact info@ncdmb.gov.ng"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
        * @OA\Response(
     *         response=500,
     *         description="Error, please fix the following error(s)!;",
     *         @OA\JsonContent(
     *             type="string",
     *
     *         )
     *
     *     )
     *
     * )
     * )
    */
      /**
     * @OA\Get(
     *     path="/roles",
     *     tags={"Roles"},
     *      summary="Returns all roles on the system",
     *     description="Returns all roles on the system",
     *     operationId="findRoles",
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Role")
     *         )
     *
     *     ),
     * @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="Page Not Found. If error persists, contact info@ncdmb.gov.ng"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
       * @OA\Response(
     *         response=500,
     *         description="Error, please fix the following error(s)!;",
     *         @OA\JsonContent(
     *             type="string",
     *
     *         )
     *
     *     )
     * )
     *     )
     * )
     */

           /**
     * @OA\Get(
     *     path="/roles/{id}",
     *     tags={"Roles"},
     *     summary="Get role by id",
     *     description="Returns based on id ",
     *     operationId="showRole",
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="role id to get",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Role")
     *         )
     *
     *     ),
     * @OA\Response(
     *      response=404,
     *      description="Page Not Found. If error persists, contact info@ncdmb.gov.ng"
     *   ),
     *     * @OA\Response(
     *         response=500,
     *         description="Error, please fix the following error(s)!;",
     *         @OA\JsonContent(
     *             type="string",
     *
     *         )
     *
     *     ),
     *      @OA\Response(
     *          response=422,
     *          description="Invalid role id"
     *      )
     *
     * )
     *     )
     * )
     */

                /**
     * @OA\Get(
     *     path="/roles/{id}/edit",
     *     tags={"Roles"},
     *      summary="Open form to edit role",
     *     description="Returns based on id ",
     *     operationId="editRole",
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="role id to edit",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Role")
     *         )
     *
     *     ),
     *     * @OA\Response(
     *         response=500,
     *         description="Error, please fix the following error(s)!;",
     *         @OA\JsonContent(
     *             type="string",
     *
     *         )
     *
     *     ),
     * @OA\Response(
     *      response=404,
     *      description="Page Not Found. If error persists, contact info@ncdmb.gov.ng"
     *   ),
     *      @OA\Response(
     *          response=422,
     *          description="Invalid role id"
     *      )
     *
     * )
     *     )
     * )
     */


                /**
     * @OA\Put(
     *     path="/roles/{id}",
     *     tags={"Roles"},
     *      summary="update role by database",
     *     description="Updates role in database",
     *     operationId="updateRole",
     *
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="role id to update",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Role updated successfully!",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Role")
     *         )
     *
     *     ),
     * @OA\Response(
     *         response=500,
     *         description="Error, please fix the following error(s)!;",
     *         @OA\JsonContent(
     *             type="string",
     *
     *         )
     *
     *     ),
     * @OA\Response(
     *      response=404,
     *      description="Page Not Found. If error persists, contact info@ncdmb.gov.ng"
     *   ),
     *      @OA\Response(
     *          response=422,
     *          description="Invalid role id"
     *      )
     *
     * )
     *     )
     * )
     */

                     /**
     * @OA\Delete(
     *     path="/roles/{id}",
     *     tags={"Roles"},
     *      summary="remove role from database",
     *     description="Deletes role in database",
     *     operationId="updateRole",
     *
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="role id to delete",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Role deleted successfully!",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Role")
     *         )
     *
     *     ),
     * @OA\Response(
     *         response=500,
     *         description="Error, please fix the following error(s)!;",
     *         @OA\JsonContent(
     *             type="string",
     *
     *         )
     *
     *     ),
     * @OA\Response(
     *      response=404,
     *      description="Page Not Found. If error persists, contact info@ncdmb.gov.ng"
     *   ),
     *      @OA\Response(
     *          response=422,
     *          description="Invalid role id"
     *      )
     *
     * )
     *     )
     * )
     */

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
            ], 200);
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
