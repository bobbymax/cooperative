<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
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
        $todos = Todo::latest()->get();

        if ($todos->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found!'
            ], 404);
        }

        return response()->json([
            'data' => $todos,
            'status' => 'success',
            'message' => 'Todos List'
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
            'task_id' => 'required|integer',
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

        $todo = Todo::create($request->all());

        return response()->json([
            'data' => $todo,
            'status' => 'success',
            'message' => 'Todo Details have been created successfully!!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show($todo)
    {
        $todo = Todo::find($todo);

        if (! $todo) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        return response()->json([
            'data' => $todo,
            'status' => 'success',
            'message' => 'Todo details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($todo)
    {
        $todo = Todo::find($todo);

        if (! $todo) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        return response()->json([
            'data' => $todo,
            'status' => 'success',
            'message' => 'Todo details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $todo)
    {
        $validator = Validator::make($request->all(), [
            'task_id' => 'required|integer',
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

        $todo = Todo::find($todo);

        if (! $todo) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $todo->update($request->all());

        return response()->json([
            'data' => $todo,
            'status' => 'success',
            'message' => 'Todo Details have been updated successfully!!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($todo)
    {
        $todo = Todo::find($todo);

        if (! $todo) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $old = $todo;
        $todo->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Todo Details have been deleted successfully!!'
        ], 200);
    }
}
