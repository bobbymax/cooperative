<?php

namespace App\Http\Controllers;

use App\Models\BudgetHead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BudgetHeadController extends Controller
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
        $budgetHeads = BudgetHead::latest()->get();

        if ($budgetHeads->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found'
            ], 200);
        }

        return response()->json([
            'data' => $budgetHeads,
            'status' => 'success',
            'message' => 'Budget Head List'
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
            'code' => 'required|string|unique:budget_heads'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following error(s):'
            ], 500);
        }

        $budgetHead = BudgetHead::create([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
        ]);

        return response()->json([
            'data' => $budgetHead,
            'status' => 'success',
            'message' => 'Budget Head Created Successfully!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BudgetHead  $budgetHead
     * @return \Illuminate\Http\Response
     */
    public function show($budgetHead)
    {
        $budgetHead = BudgetHead::find($budgetHead);

        if (! $budgetHead) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid token'
            ], 422);
        }

        return response()->json([
            'data' => $budgetHead,
            'status' => 'success',
            'message' => 'Budget Head Details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BudgetHead  $budgetHead
     * @return \Illuminate\Http\Response
     */
    public function edit($budgetHead)
    {
        $budgetHead = BudgetHead::find($budgetHead);

        if (! $budgetHead) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid token'
            ], 422);
        }

        return response()->json([
            'data' => $budgetHead,
            'status' => 'success',
            'message' => 'Budget Head Details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BudgetHead  $budgetHead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $budgetHead)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'code' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following error(s):'
            ], 500);
        }

        $budgetHead = BudgetHead::find($budgetHead);

        if (! $budgetHead) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid token'
            ], 422);
        }

        $budgetHead->update([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
        ]);

        return response()->json([
            'data' => $budgetHead,
            'status' => 'success',
            'message' => 'Budget Head Details updated successfully!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BudgetHead  $budgetHead
     * @return \Illuminate\Http\Response
     */
    public function destroy($budgetHead)
    {
        $budgetHead = BudgetHead::find($budgetHead);

        if (! $budgetHead) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid token'
            ], 422);
        }

        $old = $budgetHead;
        $budgetHead->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Budget Head deleted successfully!'
        ], 200);
    }
}
