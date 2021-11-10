<?php

namespace App\Http\Controllers;

use App\Models\Draft;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


/**
     * @OA\Post(
     * path="/drafts",
     *   tags={"Drafts"},
     *   summary="Save  drafts",
     *   operationId="drafts",
     *
     *   @OA\Parameter(
     *      name="user_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="integer"
     *      )
     * ),
     *  @OA\Parameter(
     *      name="document_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="integer",
     *      )
     * ),
     *  @OA\Parameter(
     *      name="remark",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     * ),
     *  @OA\Parameter(
     *      name="status",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string",
     *          enum={"pending", "approved", "denied"}
     *      )
     * ),
     *  @OA\Parameter(
     *      name="closed",
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
     *     path="/drafts",
     *     tags={"Drafts"},
     *      summary="Returns all drafts on the system",
     *     description="Returns all drafts on the system",
     *     operationId="findRoles",
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Draft")
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
     *          response=204,
     *          description="No Data Found!"
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
     *     path="/drafts/{id}",
     *     tags={"Drafts"},
     *     summary="Get drafts by id",
     *     description="Returns based on id ",
     *     operationId="showRole",
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="drafts id to get",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Draft")
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
     *          description="Invalid drafts id"
     *      )
     *
     * )
     *     )
     * )
     */

                /**
     * @OA\Get(
     *     path="/drafts/{id}/edit",
     *     tags={"Drafts"},
     *      summary="Open form to edit drafts",
     *     description="Returns based on id ",
     *     operationId="editRole",
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="drafts id to edit",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Draft")
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
     *          description="Invalid drafts id"
     *      )
     *
     * )
     *     )
     * )
     */


                /**
     * @OA\Put(
     *     path="/drafts/{id}",
     *     tags={"Drafts"},
     *      summary="update drafts by database",
     *     description="Updates drafts in database",
     *     operationId="updateRole",
     *
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="drafts id to update",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Draft updated successfully!",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Draft")
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
     *          description="Invalid drafts id"
     *      )
     *
     * )
     *     )
     * )
     */

                     /**
     * @OA\Delete(
     *     path="/drafts/{id}",
     *     tags={"Drafts"},
     *      summary="remove drafts from database",
     *     description="Deletes drafts in database",
     *     operationId="updateRole",
     *
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="drafts id to delete",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Draft deleted successfully!",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Draft")
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
     *          description="Invalid drafts id"
     *      )
     *
     * )
     *     )
     * )
     */
class DraftController extends Controller
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
        $drafts = Draft::latest()->get();

        if ($drafts->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found!'
            ], 404);
        }

        return response()->json([
            'data' => $drafts,
            'status' => 'success',
            'message' => 'Draft List'
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
            'document_id' => 'required|integer',
            'remark' => 'required|min:5',
            'status' => 'required|string|max:255|in:approved,denied'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $draft = Draft::create([
            'user_id' => auth()->user()->id,
            'document_id' => $request->document_id,
            'remark' => $request->remark,
            'status' => $request->status
        ]);

        return response()->json([
            'data' => $draft,
            'status' => 'success',
            'message' => 'Document Draft has been created successfully!!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function show($draft)
    {
        $draft = Draft::find($draft);
        if (! $draft) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $draft,
            'status' => 'success',
            'message' => 'Document Draft details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function edit($draft)
    {
        $draft = Draft::find($draft);
        if (! $draft) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $draft,
            'status' => 'success',
            'message' => 'Document Draft details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $draft)
    {
        $validator = Validator::make($request->all(), [
            'remark' => 'required|min:5',
            'status' => 'required|string|max:255|in:approved,denied'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $draft = Draft::find($draft);
        if (! $draft) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $draft->update([
            'remark' => $request->remark,
            'status' => $request->status
        ]);

        return response()->json([
            'data' => $draft,
            'status' => 'success',
            'message' => 'Document Draft has been updated successfully!!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function destroy($draft)
    {
        $draft = Draft::find($draft);
        if (! $draft) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $old = $draft;
        $draft->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Document Draft has been deleted successfully!!'
        ], 200);
    }
}
