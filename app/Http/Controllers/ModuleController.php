<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Department;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


/**
     * @OA\Post(
     * path="/modules",
     *   tags={"Modules"},
     *   summary="Save  Module",
     *   operationId="modules",
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
     *      name="label",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="code",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="path",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="icon",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="parentId",
     *      description="A checkbox of permissions",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="integer"
     *      )
     * ),
     *      @OA\Parameter(
     *      name="quickAccess",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="boolean"
     *      )
     * ),
     *  @OA\Parameter(
     *      name="type",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string",
     *          enum={"application","module","page"}
     *      )
     * ),
     *  @OA\Parameter(
     *      name="generatePermissions",
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
     *     path="/modules",
     *     tags={"Modules"},
     *      summary="Returns all modules on the system",
     *     description="Returns all modules on the system",
     *     operationId="findRoles",
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Module")
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
     *     path="/modules/{id}",
     *     tags={"Modules"},
     *     summary="Get Module by id",
     *     description="Returns based on id ",
     *     operationId="showRole",
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Module id to get",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Module")
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
     *          description="Invalid Module id"
     *      )
     *
     * )
     *     )
     * )
     */

                /**
     * @OA\Get(
     *     path="/modules/{id}/edit",
     *     tags={"Modules"},
     *      summary="Open form to edit Module",
     *     description="Returns based on id ",
     *     operationId="editRole",
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Module id to edit",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Module")
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
     *          description="Invalid Module id"
     *      )
     *
     * )
     *     )
     * )
     */


                /**
     * @OA\Put(
     *     path="/modules/{id}",
     *     tags={"Modules"},
     *      summary="update Module by database",
     *     description="Updates Module in database",
     *     operationId="updateRole",
     *
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Module id to update",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Module updated successfully!",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Module")
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
     *          description="Invalid Module id"
     *      )
     *
     * )
     *     )
     * )
     */

                     /**
     * @OA\Delete(
     *     path="/modules/{id}",
     *     tags={"Modules"},
     *      summary="remove Module from database",
     *     description="Deletes Module in database",
     *     operationId="updateRole",
     *
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Module id to delete",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Module deleted successfully!",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Module")
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
     *          description="Invalid Module id"
     *      )
     *
     * )
     *     )
     * )
     */
class ModuleController extends Controller
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
        $modules = Module::latest()->get();

        if ($modules->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found'
            ], 404);
        }

        return response()->json([
            'data' => $modules,
            'status' => 'success',
            'message' => 'Modules List'
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
            'code' => 'required|string|max:255',
            'path' => 'required|string',
            'generatePermissions' => 'required',
            'type' => 'required|string|in:application,module,page',
            'parentId' => 'required',
            'quickAccess' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following error(s):'
            ], 500);
        }

        $module = Module::create([
            'name' => $request->name,
            'label' => Str::slug($request->name),
            'code' => $request->code,
            'path' => $request->path,
            'icon' => $request->icon,
            'parentId' => $request->parentId,
            'generatePermissions' => $request->generatePermissions,
            'quickAccess' => $request->quickAccess,
            'type' => $request->type
        ]);

        if ($request->generatePermissions) {

            foreach ($module->normalizer($module->name) as $value) {
                $permission = $module->savePermission($value, $module->name);

                if ($permission != null) {
                    $module->addPermission($permission);
                }
            }

        }

        return response()->json([
            'data' => $module,
            'status' => 'success',
            'message' => 'Module Created Successfully!'
        ], 201);
    }

    public function grantDepartmentsAccess(Request $request, $module)
    {
        $validator = Validator::make($request->all(), [
            'departments' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following error(s):'
            ], 500);
        }

        $module = Module::find($module);

        if (! $module) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid token'
            ], 422);
        }

        foreach ($request->departments as $value) {
            $department = Department::find($value);

            if ($department && ! in_array($department->id, $module->departments->pluck('id')->toArray())) {
                $module->grantDepartmentAccess($department);
            }
        }

        return response()->json([
            'data' => $module,
            'status' => 'success',
            'message' => 'Departments have been added to this module successfully!'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show($module)
    {
        $module = Module::find($module);

        if (! $module) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid token'
            ], 422);
        }

        return response()->json([
            'data' => $module,
            'status' => 'success',
            'message' => 'Module Details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit($module)
    {
        $module = Module::find($module);

        if (! $module) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid token'
            ], 422);
        }

        return response()->json([
            'data' => $module,
            'status' => 'success',
            'message' => 'Module Details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $module)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'path' => 'required|string',
            'type' => 'required|string|in:application,module,page',
            'parentId' => 'required',
            'quickAccess' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following error(s):'
            ], 500);
        }

        $module = Module::find($module);

        if (! $module) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid token'
            ], 422);
        }

        $module->update([
            'name' => $request->name,
            'label' => Str::slug($request->name),
            'path' => $request->path,
            'icon' => $request->icon,
            'code' => $request->code,
            'parentId' => $request->parentId,
            'quickAccess' => $request->quickAccess,
            'type' => $request->type
        ]);

        return response()->json([
            'data' => $module,
            'status' => 'success',
            'message' => 'Module updated successfully!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy($module)
    {
        $module = Module::find($module);
        if (! $module) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid token'
            ], 422);
        }
        $module->permissions()->detach();
        foreach ($module->normalizer($module->name) as $value) {
            $str = Str::slug($value);
            $permission = Permission::where('key', $str)->first();

            if ($permission) {
                $permission->delete();
            }
        }
        $old = $module;
        $module->delete();
        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Module deleted successfully!'
        ], 200);
    }
}
