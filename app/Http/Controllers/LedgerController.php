<?php

namespace App\Http\Controllers;

use App\Models\Ledger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LedgerController extends Controller
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
        $ledgers = Ledger::latest()->get();

        if ($ledgers->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found!'
            ], 404);
        }

        return response()->json([
            'data' => $ledgers,
            'status' => 'success',
            'message' => 'Ledgers List'
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
            'journal_id' => 'required|integer',
            'pv_no' => 'required|string|unique:ledgers',
            'mode_of_payment' => 'required|string|in:cheque,by-cash,bank-transfer',
            'type' => 'required|string|in:c,d,a'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $ledger = Ledger::create([
            'journal_id' => $request->journal_id,
            'pv_no' => $request->pv_no,
            'mode_of_payment' => $request->mode_of_payment,
            'type' => $request->type,
        ]);

        return response()->json([
            'data' => $ledger,
            'status' => 'success',
            'message' => 'Ledger has been created successfully!!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ledger  $ledger
     * @return \Illuminate\Http\Response
     */
    public function show($ledger)
    {
        $ledger = Ledger::find($ledger);
        if (! $ledger) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $ledger,
            'status' => 'success',
            'message' => 'Ledger details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ledger  $ledger
     * @return \Illuminate\Http\Response
     */
    public function edit($ledger)
    {
        $ledger = Ledger::find($ledger);
        if (! $ledger) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $ledger,
            'status' => 'success',
            'message' => 'Ledger details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ledger  $ledger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ledger)
    {
        $validator = Validator::make($request->all(), [
            'journal_id' => 'required|integer',
            'pv_no' => 'required|string',
            'mode_of_payment' => 'required|string|in:cheque,by-cash,bank-transfer',
            'type' => 'required|string|in:c,d,a',
            'status' => 'required|string|in:generated,in-process,posted,paid'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $ledger = Ledger::find($ledger);
        if (! $ledger) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $ledger = Ledger::create([
            'journal_id' => $request->journal_id,
            'pv_no' => $request->pv_no,
            'mode_of_payment' => $request->mode_of_payment,
            'type' => $request->type,
            'status' => $request->status,
            'closed' => isset($request->closed) ? $request->closed : false
        ]);

        return response()->json([
            'data' => $ledger,
            'status' => 'success',
            'message' => 'Ledger has been updated successfully!!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ledger  $ledger
     * @return \Illuminate\Http\Response
     */
    public function destroy($ledger)
    {
        $ledger = Ledger::find($ledger);
        if (! $ledger) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $old = $ledger;
        $ledger->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Account details'
        ], 200);
    }
}
