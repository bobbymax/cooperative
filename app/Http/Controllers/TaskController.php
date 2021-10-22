<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TaskController extends Controller
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
        $tasks = Task::latest()->get();

        if ($tasks->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found!'
            ], 404);
        }

        return response()->json([
            'data' => $tasks,
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
            'user_id' => 'required|integer',
            'department_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'reference_no' => 'required|string|max:255',
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

        $task = Task::create($request->all());

        return response()->json([
            'data' => $task,
            'status' => 'success',
            'message' => 'Task Details have been created successfully!!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($task)
    {
        $task = Task::find($task);

        if (! $task) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        return response()->json([
            'data' => $task,
            'status' => 'success',
            'message' => 'Task details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($task)
    {
        $task = Task::find($task);

        if (! $task) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        return response()->json([
            'data' => $task,
            'status' => 'success',
            'message' => 'Task details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $task)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'department_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'reference_no' => 'required|string|max:255',
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

        $task = Task::find($task);

        if (! $task) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $task->update($request->all());

        return response()->json([
            'data' => $task,
            'status' => 'success',
            'message' => 'Task Details have been updated successfully!!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($task)
    {
        $task = Task::find($task);

        if (! $task) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $old = $task;
        $task->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Task Details have been updated successfully!!'
        ], 201);
    }
}
