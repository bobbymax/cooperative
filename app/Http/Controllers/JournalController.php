<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JournalController extends Controller
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
        $journals = Journal::latest()->get();

        if ($journals->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found!'
            ], 404);
        }

        return response()->json([
            'data' => $journals,
            'status' => 'success',
            'message' => 'Accounts List'
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
            'account_code_id' => 'required|integer',
            'batch_id' => 'required|integer',
            'amount' => 'required|integer',
            'description' => 'required|min:3',
            'currency' => 'required|string|in:NGN,USD,GBP,EUR,YEN',
            'month' => 'required|integer',
            'year' => 'required|integer',
            'type' => 'required|string|in:third-party,staff-payment',
            'entries' => 'required|array',
            'code' => 'required|string|max:255|unique:journals'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $journal = Journal::create([
            'account_code_id' => $request->account_code_id,
            'batch_id' => $request->batch_id,
            'user_id' => auth()->user()->id,
            'amount' => $request->amount,
            'description' => $request->description,
            'currency' => $request->currency,
            'month' => $request->month,
            'year' => $request->year,
            'type' => $request->type,
            'code' => $request->code
        ]);

        if ($journal && $request->entries) {
            foreach ($request->entries as $value) {
                $entry = new Entry;
                $entry->account_id = $value['account_id'];
                $entry->expenditure_id = $value['expenditure_id'];
                $entry->amount = $value['amount'];
                $entry->description = $value['description'];
                $entry->type = $value['type'];
                $journal->entries()->save($entry);
            }
        }

        return response()->json([
            'data' => $journal,
            'status' => 'success',
            'message' => 'Journal has been posted successfully!!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function show($journal)
    {
        $journal = Journal::find($journal);
        if (! $journal) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $journal,
            'status' => 'success',
            'message' => 'Journal details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function edit($journal)
    {
        $journal = Journal::find($journal);
        if (! $journal) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $journal,
            'status' => 'success',
            'message' => 'Journal details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $journal)
    {
        $validator = Validator::make($request->all(), [
            'account_code_id' => 'required|integer',
            'description' => 'required|min:3',
            'month' => 'required|integer',
            'year' => 'required|integer',
            'type' => 'required|string|in:third-party,staff-payment',
            'entries' => 'required|array'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $journal = Journal::find($journal);
        if (! $journal) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $journal->update([
            'account_code_id' => $request->account_code_id,
            'description' => $request->description,
            'month' => $request->month,
            'year' => $request->year,
            'type' => $request->type
        ]);

        if ($journal && $request->entries) {
            foreach ($request->entries as $value) {
                $entry = Entry::find($value['id']);

                if ($entry) {
                    $entry->account_id = $value['account_id'];
                    $entry->expenditure_id = $value['expenditure_id'];
                    $entry->amount = $value['amount'];
                    $entry->description = $value['description'];
                    $entry->type = $value['type'];
                    $journal->entries()->save($entry);
                }
            }
        }

        return response()->json([
            'data' => $journal,
            'status' => 'success',
            'message' => 'Journal entry has been updated successfully!!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function destroy($journal)
    {
        $journal = Journal::find($journal);
        if (! $journal) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $old = $journal;
        $journal->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Account details'
        ], 200);
    }
}
