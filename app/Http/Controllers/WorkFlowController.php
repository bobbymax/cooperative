<?php

namespace App\Http\Controllers;

use App\Models\WorkFlow;
use App\Models\Process;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class WorkFlowController extends Controller
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
        $workFlows = WorkFlow::latest()->get();

        if ($workFlows->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found'
            ], 200);
        }

        return response()->json([
            'data' => $workFlows,
            'status' => 'success',
            'message' => 'WorkFlow List'
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
            'type' => 'required|string|in:sequence,broadcast'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following error(s):'
            ], 500);
        }

        $workFlow = WorkFlow::create([
            'name' => $request->name,
            'label' => Str::slug($request->name),
            'type' => $request->type,
        ]);

        $count = 1;

        if ($request->has('processes')) {
            foreach($request->processes as $process) {
                $group = Group::find($process);

                if ($group) {
                    Process::create([
                        'work_flow_id' => $workFlow->id,
                        'group_id' => $group->id,
                        'order' => $count++
                    ]);
                }
            }
        }

        return response()->json([
            'data' => $workFlow,
            'status' => 'success',
            'message' => 'WorkFlow Created Successfully!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkFlow  $workFlow
     * @return \Illuminate\Http\Response
     */
    public function show($workFlow)
    {
        $workFlow = WorkFlow::find($workFlow);

        if (! $workFlow) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid token'
            ], 422);
        }

        return response()->json([
            'data' => $workFlow,
            'status' => 'success',
            'message' => 'WorkFlow Details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkFlow  $workFlow
     * @return \Illuminate\Http\Response
     */
    public function edit($workFlow)
    {
        $workFlow = WorkFlow::find($workFlow);

        if (! $workFlow) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid token'
            ], 422);
        }

        return response()->json([
            'data' => $workFlow,
            'status' => 'success',
            'message' => 'WorkFlow Details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkFlow  $workFlow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $workFlow)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:sequence,broadcast'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following error(s):'
            ], 500);
        }

        $workFlow = WorkFlow::find($workFlow);

        if (! $workFlow) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid token'
            ], 422);
        }

        $workFlow->update([
            'name' => $request->name,
            'label' => Str::slug($request->name),
            'type' => $request->type,
        ]);

        return response()->json([
            'data' => $workFlow,
            'status' => 'success',
            'message' => 'WorkFlow details updated successfully!!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkFlow  $workFlow
     * @return \Illuminate\Http\Response
     */
    public function destroy($workFlow)
    {
        $workFlow = WorkFlow::find($workFlow);

        if (! $workFlow) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid token'
            ], 422);
        }
        $old = $workFlow;
        $workFlow->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'WorkFlow deleted successfully!!'
        ], 200);
    }
}
