<?php

namespace App\Http\Controllers;

use App\Models\SubBudgetHead;
use Illuminate\Http\Request;

class SubBudgetHeadController extends Controller
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
        $subBudgetHeads = SubBudgetHead::latest()->all();

        if ($subBudgetHeads->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found!'
            ], 200);
        }

        return response()->json([
            'data' => $subBudgetHeads,
            'status' => 'success',
            'message' => 'Sub-Budget Heads List'
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
            'budget_head_id' => 'required|integer',
            'department_id' => 'required|integer',
            'code' => 'required|string|max:15|unique:sub_budget_heads',
            'name' => 'required|string',
            'type' => 'required|string|in:capital,overhead,personnel'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'info',
                'message' => 'Please fix the following errors'
            ], 500);
        }

        $subBudgetHead = SubBudgetHead::create([
            'budget_head_id' => $request->budget_head_id,
            'department_id' => $request->department_id,
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type
        ]);

        return response()->json([
            'data' => $subBudgetHead,
            'status' => 'success',
            'message' => 'Sub-Budget Head has been created successfully!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubBudgetHead  $subBudgetHead
     * @return \Illuminate\Http\Response
     */
    public function show($subBudgetHead)
    {
        $subBudgetHead = SubBudgetHead::find($subBudgetHead);

        if (! $subBudgetHead) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        return response()->json([
            'data' => $subBudgetHead,
            'status' => 'success',
            'message' => 'Sub-Budget Head details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubBudgetHead  $subBudgetHead
     * @return \Illuminate\Http\Response
     */
    public function edit($subBudgetHead)
    {
        $subBudgetHead = SubBudgetHead::find($subBudgetHead);

        if (! $subBudgetHead) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        return response()->json([
            'data' => $subBudgetHead,
            'status' => 'success',
            'message' => 'Sub-Budget Head details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubBudgetHead  $subBudgetHead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subBudgetHead)
    {
        $validator = Validator::make($request->all(), [
            'budget_head_id' => 'required|integer',
            'department_id' => 'required|integer',
            'name' => 'required|string',
            'type' => 'required|string|in:capital,overhead,personnel'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'info',
                'message' => 'Please fix the following errors'
            ], 500);
        }

        $subBudgetHead = SubBudgetHead::find($subBudgetHead);

        if (! $subBudgetHead) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $subBudgetHead->update([
            'budget_head_id' => $request->budget_head_id,
            'department_id' => $request->department_id,
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type
        ]);

        return response()->json([
            'data' => $subBudgetHead,
            'status' => 'success',
            'message' => 'Sub-Budget Head has been updated successfully!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubBudgetHead  $subBudgetHead
     * @return \Illuminate\Http\Response
     */
    public function destroy($subBudgetHead)
    {
        $subBudgetHead = SubBudgetHead::find($subBudgetHead);

        if (! $subBudgetHead) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $old = $subBudgetHead;
        $subBudgetHead->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Sub-Budget Head deleted successfully'
        ], 200);
    }
}
