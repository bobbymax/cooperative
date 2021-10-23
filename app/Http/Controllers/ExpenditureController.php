<?php

namespace App\Http\Controllers;

use App\Models\Expenditure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ExpenditureController extends Controller
{

    protected $module;

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
        $expenditures = Expenditure::latest()->get();

        if ($expenditures->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found'
            ], 404);
        }

        return response()->json([
            'data' => $expenditures,
            'status' => 'success',
            'message' => 'Expenditure List'
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
            'amount' => 'required|integer',
            'reference_no' => 'required|string|unique:expenditures',
            'currency' => 'required|string|in:NGN,USD,EUR,YEN,GBP,CAD',
            'beneficiary' => 'required|string|max:255',
            'description' => 'required|min:5',
            'type' => 'required|string|in:third-party,staff',
            'module_id' => 'required|integer',
            'module' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $this->module = $this->getModule($request->module, $request->module_id);

        if ($this->module == null) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'This module returned a null value'
            ], 422);
        }

        $expenditure = new Expenditure;
        $expenditure->user_id = auth()->user()->id;
        $expenditure->sub_budget_head_id = $request->sub_budget_head_id;
        $expenditure->reference_no = $request->reference_no;
        $expenditure->percentage_pay = $request->percentage_pay ?? 0;
        $expenditure->amount = $request->amount;
        $expenditure->beneficiary = $request->beneficiary;
        $expenditure->description = $request->description;
        $expenditure->additional_info = $request->additional_info;
        $expenditure->currency = $request->currency;
        $expenditure->type = $request->type;

        $this->module->expenditures()->save($expenditure);

        return response()->json([
            'data' => $expenditure,
            'status' => 'success',
            'message' => 'Expenditure created successfully!'
        ], 201);
    }

    private function getModule($str, $id)
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
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function show($expenditure)
    {
        $expenditure = Expenditure::find($expenditure);

        if (! $expenditure) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid expenditure ID'
            ], 422);
        }

        return response()->json([
            'data' => $expenditure,
            'status' => 'success',
            'message' => 'Expenditure details!'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function edit($expenditure)
    {
        $expenditure = Expenditure::find($expenditure);

        if (! $expenditure) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid expenditure ID'
            ], 422);
        }

        return response()->json([
            'data' => $expenditure,
            'status' => 'success',
            'message' => 'Expenditure details!'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $expenditure)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|integer',
            'description' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 200);
        }

        $expenditure = Expenditure::find($expenditure);

        if (! $expenditure) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid expenditure ID'
            ], 422);
        }

        $expenditure->amount = $request->amount;
        $expenditure->description = $request->description;
        $expenditure->save();

        return response()->json([
            'data' => $expenditure,
            'status' => 'success',
            'message' => 'Expenditure updated successfully!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function destroy($expenditure)
    {
        $expenditure = Expenditure::find($expenditure);

        if (! $expenditure) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid expenditure ID'
            ], 422);
        }

        $old = $expenditure;
        $expenditure->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Expenditure details!'
        ], 200);
    }
}
