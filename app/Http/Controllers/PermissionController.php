<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

/**
     * @OA\Post(
     * path="/permissions",
     *   tags={"Permissions"},
     *   summary="Save user permission",
     *   operationId="permissions",
     *
     *
     *   @OA\Parameter(
     *      name="key",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="module",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string",
     *
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
     *     path="/permissions",
     *     tags={"Permissions"},
     *      summary="Returns all permissions on the system",
     *     description="Returns all permissions on the system",
     *     operationId="findPermissions",
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Permission")
     *         )
     *
     *     ),
     * @OA\Response(
     *      response=204,
     *       description="No data found!"
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
     *     path="/permissions/{id}",
     *     tags={"Permissions"},
     *     summary="Get permission by id",
     *     description="Returns based on id ",
     *     operationId="showPermission",
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="permission id to get",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Permission")
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
     *          description="Invalid permission id"
     *      )
     *
     * )
     *     )
     * )
     */

                /**
     * @OA\Get(
     *     path="/permissions/{id}/edit",
     *     tags={"Permissions"},
     *      summary="Open form to edit permission",
     *     description="Returns based on id ",
     *     operationId="editPermission",
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="permission id to edit",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Permission")
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
     *          description="Invalid permission id"
     *      )
     *
     * )
     *     )
     * )
     */


                /**
     * @OA\Put(
     *     path="/permissions/{id}",
     *     tags={"Permissions"},
     *      summary="update permission by database",
     *     description="Updates permission in database",
     *     operationId="updatePermission",
     *
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="permission id to update",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Role updated successfully!",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Permission")
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
     *          description="Invalid permission id"
     *      )
     *
     * )
     *     )
     * )
     */

                     /**
     * @OA\Delete(
     *     path="/permissions/{id}",
     *     tags={"Permissions"},
     *      summary="remove permission from database",
     *     description="Deletes permission in database",
     *     operationId="updatePermission",
     *
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="permission id to delete",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Role deleted successfully!",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Permission")
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
     *          description="Invalid permission id"
     *      )
     *
     * )
     *     )
     * )
     */

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
            ], 204);
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
        ], 200);
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
