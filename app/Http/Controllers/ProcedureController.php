<?php

namespace App\Http\Controllers;

use App\Models\Procedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
