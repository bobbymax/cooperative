<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;

class GroupController extends Controller
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
        $groups = Group::all();

        if ($groups->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'success',
                'message' => 'No data found'
            ], 200);
        }
        return response()->json([
            'data' => $groups,
            'status' => 'success',
            'message' => 'Group list'
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
            'cannot_expire' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'message' => 'Please fix the errors:',
                'status' => 'error'
            ], 500);
        }

        $group = Group::create([
            'name' => $request->name,
            'label' => Str::slug($request->name),
            'expiry_date' => isset($request->expiry_date) ? Carbon::parse($request->expiry_date) : null,
            'cannot_expire' => $request->cannot_expire
        ]);

        return response()->json([
            'data' => $group, 
            'status' => 'success', 
            'message' => 'This group has been created successfully.'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show($group)
    {
        $group = Group::find($group);

        if (! $group) {
            return response()->json([
                'data' => null, 
                'status' => 'error', 
                'message' => 'This group could not be found!'
            ], 404);
        }
        return response()->json([
            'data' => $group, 
            'status' => 'success', 
            'message' => 'Fetched group successfully.'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit($group)
    {
        $group = Group::find($group);

        if (! $group) {
            return response()->json([
                'data' => null, 
                'status' => 'error', 
                'message' => 'This group could not be found!'
            ], 404);
        }
        return response()->json([
            'data' => $group, 
            'status' => 'success', 
            'message' => 'Fetched group successfully.'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $group)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'deactivated' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'message' => 'Please fix the errors:',
                'status' => 'error'
            ], 500);
        }

        $group = Group::find($group);

        if (! $group) {
            return response()->json([
                'data' => null, 
                'status' => 'error',
                'message' => 'This group could not be found!'
            ], 404);
        }

        $group->update([
            'name' => $request->name,
            'label' => Str::slug($request->name),
            'expiry_date' => isset($request->expiry_date) ? Carbon::parse($request->expiry_date) : null,
            'cannot_expire' => $request->cannot_expire,
            'deactivated' => $request->deactivated
        ]);

        return response()->json([
            'data' => $group, 
            'status' => 'success', 
            'message' => 'Data updated successfully!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($group)
    {
        $group = Group::find($group);

        if (! $group) {
            return response()->json([
                'data' => null, 
                'status' => 'error', 
                'message' => 'This group could not be found!'
            ], 404);
        }
        
        $old = $group;
        $group->delete();

        return response()->json([
            'data' => $old, 
            'status' => 'success', 
            'message' => 'Data deleted successfully!'
        ], 200);
    }
}