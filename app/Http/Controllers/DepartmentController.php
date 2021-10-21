<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


/**
     * @OA\Post(
     * path="/departments",
     *   tags={"Departments"},
     *   summary="Save  department",
     *   operationId="departments",
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
     *          type="string",
     *
     *      )
     * ),
     * @OA\Parameter(
     *      name="type",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string",
     *          enum={"directorate", "division", "department", "unit"}
     *      )
     * ),
     * @OA\Parameter(
     *      name="parentId",
     *      in="query",
     *      @OA\Schema(
     *          type="integer",
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
     *     path="/departments",
     *     tags={"Departments"},
     *      summary="Returns all departments on the system",
     *     description="Returns all departments on the system",
     *     operationId="findGroups",
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Department")
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
     *    )
     * )
     */

           /**
     * @OA\Get(
     *     path="/departments/{id}",
     *     tags={"Departments"},
     *     summary="Get department by id",
     *     description="Returns based on id ",
     *     operationId="showGroup",
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="department id to get",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Department")
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
     *          description="Invalid department id"
     *      )
     *
     * )
     *     )
     * )
     */

                /**
     * @OA\Get(
     *     path="/departments/{id}/edit",
     *     tags={"Departments"},
     *      summary="Open form to edit department",
     *     description="Returns based on id ",
     *     operationId="editGroup",
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="department id to edit",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Department")
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
     *          description="Invalid department id"
     *      )
     *
     * )
     *     )
     * )
     */


        /**
     * @OA\Delete(
     *     path="/departments/{id}",
     *     tags={"Departments"},
     *      summary="remove department from database",
     *     description="Deletes department in database",
     *     operationId="updateGroup",
     *
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="department id to delete",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Department deleted successfully!",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Department")
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
     *          description="Invalid department id"
     *      )
     *
     * )
     *     )
     * )
     */


                /**
     * @OA\Put(
     *     path="/departments/{id}",
     *     tags={"Departments"},
     *      summary="update department by id",
     *     description="Updates department in database",
     *     operationId="updateGroup",
     *
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="department id to update",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Department updated successfully!",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Department")
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
     *          description="Invalid department id"
     *      )
     *
     * )
     *     )
     * )
     */



class DepartmentController extends Controller
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
        $departments = Department::latest()->get();

        if ($departments->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found'
            ], 204);
        }

        return response()->json([
            'data' => $departments,
            'status' => 'success',
            'message' => 'Department List'
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
            'code' => 'required|string|max:7|unique:departments',
            'type' => 'required|string|in:directorate,division,department,unit',
            'parentId' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $department = Department::create([
            'name' => $request->name,
            'label' => Str::slug($request->name),
            'code' => $request->code,
            'type' => $request->type,
            'parentId' => $request->parentId
        ]);

        return response()->json([
            'data' => $department,
            'status' => 'success',
            'message' => 'Department created successfully!'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show($department)
    {
        $department = Department::find($department);

        if (! $department) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid department ID'
            ], 422);
        }

        return response()->json([
            'data' => $department,
            'status' => 'success',
            'message' => 'Department details!'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($department)
    {
        $department = Department::find($department);

        if (! $department) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid department ID'
            ], 422);
        }

        return response()->json([
            'data' => $department,
            'status' => 'success',
            'message' => 'Department details!'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $department)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:directorate,division,department,unit',
            'parentId' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 200);
        }

        $department = Department::find($department);

        if (! $department) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid department ID'
            ], 422);
        }

        $department->update([
            'name' => $request->name,
            'label' => Str::slug($request->name),
            'code' => $request->code,
            'type' => $request->type,
            'parentId' => $request->parentId
        ]);

        return response()->json([
            'data' => $department,
            'status' => 'success',
            'message' => 'Department updated successfully!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($department)
    {
        $department = Department::find($department);

        if (! $department) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid department ID'
            ], 422);
        }

        $old = $department;
        $department->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Department deleted successfully!'
        ], 200);
    }
}
