<?php

namespace App\Http\Controllers;

use App\Models\Procedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


/**
     * @OA\Post(
     * path="/procedures",
     *   tags={"Procedures"},
     *   summary="Save  procedures",
     *   operationId="procedures",
     *
     *   @OA\Parameter(
     *      name="document_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="integer"
     *      )
     * ),
     *  @OA\Parameter(
     *      name="work_flow_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="integer",
     *      )
     * ),
     *  @OA\Parameter(
     *      name="status",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     * ),
     *  @OA\Parameter(
     *      name="started",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="boolean"
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
     *     path="/procedures",
     *     tags={"Procedures"},
     *      summary="Returns all procedures on the system",
     *     description="Returns all procedures on the system",
     *     operationId="findRoles",
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Procedure")
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
     *     path="/procedures/{id}",
     *     tags={"Procedures"},
     *     summary="Get procedures by id",
     *     description="Returns based on id ",
     *     operationId="showRole",
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="procedures id to get",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Procedure")
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
     *          description="Invalid procedures id"
     *      )
     *
     * )
     *     )
     * )
     */

                /**
     * @OA\Get(
     *     path="/procedures/{id}/edit",
     *     tags={"Procedures"},
     *      summary="Open form to edit procedures",
     *     description="Returns based on id ",
     *     operationId="editRole",
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="procedures id to edit",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Procedure")
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
     *          description="Invalid procedures id"
     *      )
     *
     * )
     *     )
     * )
     */


                /**
     * @OA\Put(
     *     path="/procedures/{id}",
     *     tags={"Procedures"},
     *      summary="update procedures by database",
     *     description="Updates procedures in database",
     *     operationId="updateRole",
     *
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="procedures id to update",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Procedure updated successfully!",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Procedure")
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
     *          description="Invalid procedures id"
     *      )
     *
     * )
     *     )
     * )
     */

                     /**
     * @OA\Delete(
     *     path="/procedures/{id}",
     *     tags={"Procedures"},
     *      summary="remove procedures from database",
     *     description="Deletes procedures in database",
     *     operationId="updateRole",
     *
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="procedures id to delete",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Procedure deleted successfully!",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Procedure")
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
     *          description="Invalid procedures id"
     *      )
     *
     * )
     *     )
     * )
     */
class ProcedureController extends Controller
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
        $procedures = Procedure::latest()->get();

        if ($procedures->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found!'
            ], 404);
        }

        return response()->json([
            'data' => $procedures,
            'status' => 'success',
            'message' => 'Procedure List'
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
            'work_flow_id' => 'required|integer',
            'status' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $procedure = Procedure::create([
            'document_id' => $request->document_id,
            'work_flow_id' => $request->work_flow_id,
            'status' => $request->status
        ]);

        return response()->json([
            'data' => $procedure,
            'status' => 'success',
            'message' => 'Procedure has been created successfully!!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function show($procedure)
    {
        $procedure = Procedure::find($procedure);
        if (! $procedure) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $procedure,
            'status' => 'success',
            'message' => 'Procedure details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function edit($procedure)
    {
        $procedure = Procedure::find($procedure);
        if (! $procedure) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $procedure,
            'status' => 'success',
            'message' => 'Procedure details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $procedure)
    {
        $validator = Validator::make($request->all(), [
            'document_id' => 'required|integer',
            'work_flow_id' => 'required|integer',
            'status' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $procedure = Procedure::find($procedure);
        if (! $procedure) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        if ($procedure->started) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'You cannot update a procedure that has already been started!!'
            ], 422);
        }

        $procedure->update([
            'document_id' => $request->document_id,
            'work_flow_id' => $request->work_flow_id,
            'status' => $request->status
        ]);

        return response()->json([
            'data' => $procedure,
            'status' => 'success',
            'message' => 'Procedure has been updated successfully!!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function destroy($procedure)
    {
        $procedure = Procedure::find($procedure);
        if (! $procedure) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        if ($procedure->started) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'You cannot delete a procedure that has already been started!!'
            ], 422);
        }

        $old = $procedure;
        $procedure->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Procedure has been updated successfully!!'
        ], 200);
    }
}
