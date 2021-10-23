<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{

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
        $milestones = Milestone::latest()->get();

        if ($milestones->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found!'
            ], 404);
        }

        return response()->json([
            'data' => $milestones,
            'status' => 'success',
            'message' => 'Tasks List'
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
            'project_id' => 'required|integer',
            'duration' => 'required|integer',
            'start_date' => 'required|date',
            'expiry' => 'required|date',
            'description' => 'required',
            'measure' => 'required|string|in:minutes,hours,days,weeks,months,years'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $milestone = Milestone::create($request->all());

        return response()->json([
            'data' => $milestone,
            'status' => 'success',
            'message' => 'Task Details have been created successfully!!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Milestone  $milestone
     * @return \Illuminate\Http\Response
     */
    public function show($milestone)
    {
        $milestone = Milestone::find($milestone);

        if (! $milestone) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        return response()->json([
            'data' => $milestone,
            'status' => 'success',
            'message' => 'Task details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Milestone  $milestone
     * @return \Illuminate\Http\Response
     */
    public function edit($milestone)
    {
        $milestone = Milestone::find($milestone);

        if (! $milestone) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        return response()->json([
            'data' => $milestone,
            'status' => 'success',
            'message' => 'Task details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Milestone  $milestone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $milestone)
    {
        $validator = Validator::make($request->all(), [
            'project_id' => 'required|integer',
            'duration' => 'required|integer',
            'start_date' => 'required|date',
            'expiry' => 'required|date',
            'description' => 'required',
            'measure' => 'required|string|in:minutes,hours,days,weeks,months,years'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $milestone = Milestone::find($milestone);

        if (! $milestone) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $milestone->update($request->all());

        return response()->json([
            'data' => $milestone,
            'status' => 'success',
            'message' => 'Task Details have been updated successfully!!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Milestone  $milestone
     * @return \Illuminate\Http\Response
     */
    public function destroy($milestone)
    {
        $milestone = Milestone::find($milestone);

        if (! $milestone) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $old = $milestone;
        $milestone->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Task Details have been updated successfully!!'
        ], 200);
    }
}
