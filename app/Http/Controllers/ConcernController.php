<?php

namespace App\Http\Controllers;

use App\Models\Concern;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ConcernController extends Controller
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
        $concerns = Concern::latest()->get();

        if ($concerns->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found!'
            ], 404);
        }

        return response()->json([
            'data' => $concerns,
            'status' => 'success',
            'message' => 'Concerns list'
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
            'category_id' => 'required|integer',
            'specifications' => 'required|min:3'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following error(s)!:'
            ], 500);
        }

        $concern = Concern::create([
            'name' => $request->name,
            'label' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'specifications' => $request->specifications
        ]);

        return response()->json([
            'data' => $concern,
            'status' => 'success',
            'message' => 'Concern has been created successfully!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Concern  $concern
     * @return \Illuminate\Http\Response
     */
    public function show($concern)
    {
        $concern = Concern::find($concern);

        if (! $concern) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid concern id'
            ], 422);
        }

        return response()->json([
            'data' => $concern,
            'status' => 'success',
            'message' => 'Concern Details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Concern  $concern
     * @return \Illuminate\Http\Response
     */
    public function edit($concern)
    {
        $concern = Concern::find($concern);

        if (! $concern) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid concern id'
            ], 422);
        }

        return response()->json([
            'data' => $concern,
            'status' => 'success',
            'message' => 'Concern Details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Concern  $concern
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $concern)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'specifications' => 'required|min:3'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following error(s)!:'
            ], 500);
        }

        $concern = Concern::find($concern);

        if (! $concern) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid concern id'
            ], 422);
        }

        $concern->update([
            'name' => $request->name,
            'label' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'specifications' => $request->specifications
        ]);

        return response()->json([
            'data' => $concern,
            'status' => 'success',
            'message' => 'Concern has been updated successfully!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Concern  $concern
     * @return \Illuminate\Http\Response
     */
    public function destroy($concern)
    {
        $concern = Concern::find($concern);

        if (! $concern) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid concern id'
            ], 422);
        }

        $old = $concern;
        $concern->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Concern has been deleted successfully!'
        ], 200);
    }
}
