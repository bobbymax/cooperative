<?php

namespace App\Http\Controllers;

use App\Models\Timeline;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


/**
     * @OA\Post(
     * path="/timelines",
     *   tags={"Timelines"},
     *   summary="Save  timeline",
     *   operationId="timelines",
     *
     *
     *   @OA\Parameter(
     *      name="timelineable_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="timelineable_type",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     * ),
     *
     *   @OA\Response(
     *      response=201,
     *       description="Timeline has been created successfully",
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
     *          response=422,
     *          description="Invalid HOlder ID"
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
     *     path="/timelines",
     *     tags={"Timelines"},
     *      summary="Returns all timelines on the system",
     *     description="Returns all timelines on the system",
     *     operationId="findRoles",
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Timeline")
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
     *      description="No data found"
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
     *     path="/timelines/{id}",
     *     tags={"Timelines"},
     *     summary="Get timeline by id",
     *     description="Returns based on id ",
     *     operationId="showTimeline",
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="timeline id to get",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Timeline")
     *         )
     *
     *     ),
     * @OA\Response(
     *      response=404,
     *      description="No data found"
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
     *          description="Invalid timeline id"
     *      )
     *
     * )
     *     )
     * )
     */

                /**
     * @OA\Get(
     *     path="/timelines/{id}/edit",
     *     tags={"Timelines"},
     *      summary="Open form to edit timeline",
     *     description="Returns based on id ",
     *     operationId="editRole",
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="timeline id to edit",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Timeline Details",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Timeline")
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
     *          description="Invalid timeline id"
     *      )
     *
     * )
     *     )
     * )
     */


                     /**
     * @OA\Delete(
     *     path="/timelines/{id}",
     *     tags={"Timelines"},
     *      summary="remove timeline from database",
     *     description="Deletes timeline in database",
     *     operationId="updateRole",
     *
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="timeline id to delete",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Timeline deleted successfully!",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Timeline")
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
     *          description="Invalid timeline id"
     *      )
     *
     * )
     *     )
     * )
     */
class TimelineController extends Controller
{

    protected $entity;

    /**
     * Class Constructor
     */
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
        $timelines = Timeline::latest()->get();

        if ($timelines->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found!'
            ], 404);
        }

        return response()->json([
            'data' => $timelines,
            'status' => 'success',
            'message' => 'Timelines List'
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
            'entity' => 'required|string',
            'entity_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $this->entity = $this->getEntity($request->entity, $request->entity_id);

        if ($this->entity == null) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid holder ID'
            ], 422);
        }

        $timeline = new Timeline;
        $this->entity->timeline()->save($timeline);

        return response()->json([
            'data' => $timeline,
            'status' => 'success',
            'message' => 'Timeline has been created successfully!!'
        ], 201);
    }

    protected function getEntity($str, $id)
    {
        switch ($str) {
            case 'project':
                return Project::find($id);
                break;

            default:
                return null;
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Timeline  $timeline
     * @return \Illuminate\Http\Response
     */
    public function show($timeline)
    {
        $timeline = Timeline::find($timeline);
        if (! $timeline) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $timeline,
            'status' => 'success',
            'message' => 'Timeline details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Timeline  $timeline
     * @return \Illuminate\Http\Response
     */
    public function edit($timeline)
    {
        $timeline = Timeline::find($timeline);
        if (! $timeline) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $timeline,
            'status' => 'success',
            'message' => 'Timeline details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Timeline  $timeline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $timeline)
    {
        // $validator = Validator::make($request->all(), [
        //     'description' => 'required|min:5',
        //     'duration' => 'required|integer',
        //     'measure' => 'required|integer'
        // ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'data' => $validator->errors(),
        //         'status' => 'error',
        //         'message' => 'Please fix the following errors:'
        //     ], 500);
        // }

        // $timeline = Timeline::find($timeline);
        // if (! $timeline) {
        //     return response()->json([
        //         'data' => null,
        //         'status' => 'error',
        //         'message' => 'Invalid ID entered'
        //     ], 422);
        // }

        // $timeline->update([
        //     'description' => $request->description,
        //     'duration' => $request->duration,
        //     'measure' => $request->measure,
        //     'closed' => isset($request->closed) ? $request->closed : false
        // ]);

        // return response()->json([
        //     'data' => $timeline,
        //     'status' => 'success',
        //     'message' => 'Timeline has been updated successfully!!'
        // ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Timeline  $timeline
     * @return \Illuminate\Http\Response
     */
    public function destroy($timeline)
    {
        $timeline = Timeline::find($timeline);
        if (! $timeline) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $old = $timeline;
        $timeline->update();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Timeline has been updated successfully!!'
        ], 200);
    }
}
