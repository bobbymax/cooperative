<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

/**
     * @OA\Post(
     * path="/serviceCategories",
     *   tags={"ServiceCategories"},
     *   summary="Save user role",
     *   operationId="serviceCategories",
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
     *      name="description",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
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
     *     path="/serviceCategories",
     *     tags={"ServiceCategories"},
     *      summary="Returns all serviceCategories on the system",
     *     description="Returns all serviceCategories on the system",
     *     operationId="ServiceCategories",
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/ServiceCategory")
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
     *     path="/serviceCategories/{id}",
     *     tags={"ServiceCategories"},
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
     *             @OA\Items(ref="#/components/schemas/ServiceCategory")
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
     *     path="/serviceCategories/{id}/edit",
     *     tags={"ServiceCategories"},
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
     *             @OA\Items(ref="#/components/schemas/ServiceCategory")
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
     *     path="/serviceCategories/{id}",
     *     tags={"ServiceCategories"},
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
     *         description="ServiceCategory updated successfully!",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/ServiceCategory")
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
     *     path="/serviceCategories/{id}",
     *     tags={"ServiceCategories"},
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
     *         description="ServiceCategory deleted successfully!",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/ServiceCategory")
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
class ServiceCategoryController extends Controller
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
        $serviceCategories = ServiceCategory::latest()->get();

        if ($serviceCategories->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found!'
            ], 404);
        }

        return response()->json([
            'data' => $serviceCategories,
            'status' => 'success',
            'message' => 'Categories List'
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
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $serviceCategory = ServiceCategory::create([
            'name' => $request->name,
            'label' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return response()->json([
            'data' => $serviceCategory,
            'status' => 'success',
            'message' => 'Service Category has been created successfully!!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function show($serviceCategory)
    {
        $serviceCategory = ServiceCategory::find($serviceCategory);
        if (! $serviceCategory) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $serviceCategory,
            'status' => 'success',
            'message' => 'Service Category details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($serviceCategory)
    {
        $serviceCategory = ServiceCategory::find($serviceCategory);
        if (! $serviceCategory) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $serviceCategory,
            'status' => 'success',
            'message' => 'Service Category details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $serviceCategory)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $serviceCategory = ServiceCategory::find($serviceCategory);
        if (! $serviceCategory) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $serviceCategory->update([
            'name' => $request->name,
            'label' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return response()->json([
            'data' => $serviceCategory,
            'status' => 'success',
            'message' => 'Service Category updated successfully!!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($serviceCategory)
    {
        $serviceCategory = ServiceCategory::find($serviceCategory);
        if (! $serviceCategory) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $old = $serviceCategory;
        $serviceCategory->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Service Category has been deleted successfully!!'
        ], 200);
    }
}
