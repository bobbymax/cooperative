<?php

namespace App\Http\Controllers;

use App\Models\Draft;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DraftController extends Controller
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
        $drafts = Draft::latest()->get();

        if ($drafts->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found!'
            ], 404);
        }

        return response()->json([
            'data' => $drafts,
            'status' => 'success',
            'message' => 'Draft List'
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
            'remark' => 'required|min:5',
            'status' => 'required|string|max:255|in:approved,denied'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $draft = Draft::create([
            'user_id' => auth()->user()->id,
            'document_id' => $request->document_id,
            'remark' => $request->remark,
            'status' => $request->status
        ]);

        return response()->json([
            'data' => $draft,
            'status' => 'success',
            'message' => 'Document Draft has been created successfully!!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function show($draft)
    {
        $draft = Draft::find($draft);
        if (! $draft) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $draft,
            'status' => 'success',
            'message' => 'Document Draft details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function edit($draft)
    {
        $draft = Draft::find($draft);
        if (! $draft) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $draft,
            'status' => 'success',
            'message' => 'Document Draft details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $draft)
    {
        $validator = Validator::make($request->all(), [
            'remark' => 'required|min:5',
            'status' => 'required|string|max:255|in:approved,denied'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $draft = Draft::find($draft);
        if (! $draft) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $draft->update([
            'remark' => $request->remark,
            'status' => $request->status
        ]);

        return response()->json([
            'data' => $draft,
            'status' => 'success',
            'message' => 'Document Draft has been updated successfully!!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function destroy($draft)
    {
        $draft = Draft::find($draft);
        if (! $draft) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $old = $draft;
        $draft->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Document Draft has been deleted successfully!!'
        ], 200);
    }
}
