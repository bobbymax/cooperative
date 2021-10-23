<?php

namespace App\Http\Controllers;

use App\Models\AccountChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AccountChartController extends Controller
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
        $accountCharts = AccountChart::latest()->get();

        if ($accountCharts->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found!'
            ], 404);
        }

        return response()->json([
            'data' => $accountCharts,
            'status' => 'success',
            'message' => 'Tags List'
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
            'min' => 'required|integer',
            'max' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $accountChart = AccountChart::create([
            'name' => $request->name,
            'label' => Str::slug($request->name),
            'min' => $request->min,
            'max' => $request->max,
            'active' => true
        ]);

        return response()->json([
            'data' => $accountChart,
            'status' => 'success',
            'message' => 'Account Chart has been created successfully!!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccountChart  $accountChart
     * @return \Illuminate\Http\Response
     */
    public function show($accountChart)
    {
        $accountChart = AccountChart::find($accountChart);
        if (! $accountChart) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $accountChart,
            'status' => 'success',
            'message' => 'Account Chart details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccountChart  $accountChart
     * @return \Illuminate\Http\Response
     */
    public function edit($accountChart)
    {
        $accountChart = AccountChart::find($accountChart);
        if (! $accountChart) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $accountChart,
            'status' => 'success',
            'message' => 'Account Chart details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountChart  $accountChart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $accountChart)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'min' => 'required|integer',
            'max' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $accountChart = AccountChart::find($accountChart);
        if (! $accountChart) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $accountChart->update([
            'name' => $request->name,
            'label' => Str::slug($request->name),
            'min' => $request->min,
            'max' => $request->max,
            'active' => $request->active
        ]);

        return response()->json([
            'data' => $accountChart,
            'status' => 'success',
            'message' => 'Account Chart details'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountChart  $accountChart
     * @return \Illuminate\Http\Response
     */
    public function destroy($accountChart)
    {
        $accountChart = AccountChart::find($accountChart);
        if (! $accountChart) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $old = $accountChart;
        $accountChart->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Account Chart details'
        ], 200);
    }
}
