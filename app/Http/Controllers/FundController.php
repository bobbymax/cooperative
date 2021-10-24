<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


/**
     * @OA\Post(
     * path="/funds",
     *   tags={"Funds"},
     *   summary="Save  fund",
     *   operationId="funds",
     *
     *
     *   @OA\Parameter(
     *      name="sub_budget_head_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="description",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     * ),
     * @OA\Parameter(
     *      name="approved_amount",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="number",
     *          format="double"
     *      )
     * ),
     * @OA\Parameter(
     *      name="booked_expenditure",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="number",
     *          format="double"
     *      )
     * ),
     * @OA\Parameter(
     *      name="actual_expenditure",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="number",
     *          format="double"
     *      )
     * ),
     *  @OA\Parameter(
     *      name="booked_balance",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="number",
     *          format="double"
     *      )
     * ),
     * @OA\Parameter(
     *      name="actual_balance",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="number",
     *          format="double"
     *      )
     * ),
     *  @OA\Parameter(
     *      name="expected_performance",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="actual_performance",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="budget_year",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="funded",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="boolean"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="exhausted",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="boolean"
     *
     *      )
     *   ),
     *
     * @OA\Parameter(
     *      name="deactivated",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="boolean"
     *      )
     *   ),
     *
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
     *     path="/funds",
     *     tags={"Funds"},
     *      summary="Returns all funds on the system",
     *     description="Returns all funds on the system",
     *     operationId="findRoles",
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Fund")
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
     *     path="/funds/{id}",
     *     tags={"Funds"},
     *     summary="Get fund by id",
     *     description="Returns based on id ",
     *     operationId="showRole",
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="fund id to get",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Fund")
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
     *          description="Invalid fund id"
     *      )
     *
     * )
     *     )
     * )
     */

                /**
     * @OA\Get(
     *     path="/funds/{id}/edit",
     *     tags={"Funds"},
     *      summary="Open form to edit fund",
     *     description="Returns based on id ",
     *     operationId="editRole",
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="fund id to edit",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Fund")
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
     *          description="Invalid fund id"
     *      )
     *
     * )
     *     )
     * )
     */


                /**
     * @OA\Put(
     *     path="/funds/{id}",
     *     tags={"Funds"},
     *      summary="update fund by database",
     *     description="Updates fund in database",
     *     operationId="updateRole",
     *
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="fund id to update",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Fund updated successfully!",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Fund")
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
     *          description="Invalid fund id"
     *      )
     *
     * )
     *     )
     * )
     */

                     /**
     * @OA\Delete(
     *     path="/funds/{id}",
     *     tags={"Funds"},
     *      summary="remove fund from database",
     *     description="Deletes fund in database",
     *     operationId="updateRole",
     *
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="fund id to delete",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Fund deleted successfully!",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Fund")
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
     *          description="Invalid fund id"
     *      )
     *
     * )
     *     )
     * )
     */
class FundController extends Controller
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
        $funds = Fund::latest()->get();

        if ($funds->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found!'
            ], 404);
        }

        return response()->json([
            'data' => $funds,
            'status' => 'success',
            'message' => 'Sub-Budget Credit Lists'
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
            'sub_budget_head_id' => 'required|integer',
            'approved_amount' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $year = config('site.budget_year') ?? config('orbit.budget_year');

        $fund = Fund::create([
            'sub_budget_head_id' => $request->sub_budget_head_id,
            'description' => $request->description,
            'approved_amount' => $request->approved_amount,
            'actual_balance' => $request->approved_amount,
            'booked_balance' => $request->approved_amount,
            'budget_year' => $year,
            'funded' => true
        ]);

        return response()->json([
            'data' => $fund,
            'status' => 'success',
            'message' => 'Funds have been added to this Sub-Budget successfully!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function show($fund)
    {
        $fund = Fund::find($fund);
        if (! $fund) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $fund,
            'status' => 'success',
            'message' => 'Fund details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function edit($fund)
    {
        $fund = Fund::find($fund);
        if (! $fund) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $fund,
            'status' => 'success',
            'message' => 'Fund details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $fund)
    {
        $validator = Validator::make($request->all(), [
            'approved_amount' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $fund = Fund::find($fund);
        if (! $fund) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $fund->update([
            'description' => $request->description,
            'approved_amount' => $request->approved_amount,
            'actual_balance' => $request->approved_amount,
            'booked_balance' => $request->approved_amount
        ]);

        return response()->json([
            'data' => $fund,
            'status' => 'success',
            'message' => 'Fund details updated successfully!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function destroy($fund)
    {
        $fund = Fund::find($fund);

        if (! $fund) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        $old = $fund;
        $fund->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Sub-Budget fund deleted successfully!'
        ], 200);
    }
}
