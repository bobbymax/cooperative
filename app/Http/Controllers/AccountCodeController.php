<?php

namespace App\Http\Controllers;

use App\Models\AccountCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class AccountCodeController extends Controller
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
        $accountCodes = AccountCode::latest()->get();

        if ($accountCodes->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found!'
            ], 404);
        }

        return response()->json([
            'data' => $accountCodes,
            'status' => 'success',
            'message' => 'Account Codes List'
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
            'account_chart_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'code' => 'required|integer|unique:account_codes'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $accountCode = AccountCode::create([
            'account_chart_id' => $request->account_chart_id,
            'name' => $request->name,
            'label' => Str::slug($request->name),
            'code' => $request->code
        ]);

        return response()->json([
            'data' => $accountCode,
            'status' => 'success',
            'message' => 'Account Code has been created successfully!!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccountCode  $accountCode
     * @return \Illuminate\Http\Response
     */
    public function show($accountCode)
    {
        $accountCode = AccountCode::find($accountCode);
        if (! $accountCode) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $accountCode,
            'status' => 'success',
            'message' => 'Account Code details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccountCode  $accountCode
     * @return \Illuminate\Http\Response
     */
    public function edit($accountCode)
    {
        $accountCode = AccountCode::find($accountCode);
        if (! $accountCode) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $accountCode,
            'status' => 'success',
            'message' => 'Account Code details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountCode  $accountCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $accountCode)
    {
        $validator = Validator::make($request->all(), [
            'account_chart_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'code' => 'required|integer|unique:account_codes'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $accountCode = AccountCode::find($accountCode);
        if (! $accountCode) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $accountCode->update([
            'account_chart_id' => $request->account_chart_id,
            'name' => $request->name,
            'label' => Str::slug($request->name),
            'code' => $request->code
        ]);

        return response()->json([
            'data' => $accountCode,
            'status' => 'success',
            'message' => 'Account Code has been updated successfully!!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountCode  $accountCode
     * @return \Illuminate\Http\Response
     */
    public function destroy($accountCode)
    {
        $accountCode = AccountCode::find($accountCode);
        if (! $accountCode) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $old = $accountCode;
        $accountCode->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Account Code details deleted successfully!!'
        ], 200);
    }
}
