<?php

namespace App\Http\Controllers;

use App\Models\Requisition;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisitions = Requisition::latest()->get();

        if ($requisitions->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found'
            ], 404);
        }

        return response()->json([
            'data' => $requisitions,
            'status' => 'success',
            'message' => 'Requisition List'
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
            'user_id' => 'required|integer',
            'department_id' => 'required|integer',
            'reference_no' => 'required|string|email|max:255|unique:requisitions',
            'description' => 'required|min:3',
            'type' => 'required|string|in:purchase,request',
            'items' => 'required|array'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following error(s):'
            ], 500);
        }

        $requisition = Requisition::create($request->all());

        if ($requisition) {
            foreach($request->items as $item) {
                Item::create([
                    'requisition_id' => $requisition->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity']
                ]);
            }
        }

        return response()->json([
            'data' => $requisition,
            'status' => 'success',
            'message' => 'Requisition Created Successfully!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function show($requisition)
    {
        $requisition = Requisition::find($requisition);

        if (! $requisition) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid token'
            ], 422);
        }

        return response()->json([
            'data' => $requisition,
            'status' => 'success',
            'message' => 'Requisition Details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function edit($requisition)
    {
        $requisition = Requisition::find($requisition);

        if (! $requisition) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid token'
            ], 422);
        }

        return response()->json([
            'data' => $requisition,
            'status' => 'success',
            'message' => 'Requisition Details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $requisition)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'department_id' => 'required|integer',
            'reference_no' => 'required|string|email|max:255|unique:requisitions',
            'description' => 'required|min:3',
            'type' => 'required|string|in:purchase,request'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following error(s):'
            ], 500);
        }

        $requisition = Requisition::find($requisition);

        if (! $requisition) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid token'
            ], 422);
        }

        $requisition->update($request->all());

        if ($requisition && $request->has('items')) {
            foreach($request->items as $value) {

                $item = Item::find($value['id']);

                if ($item) {
                    $item->update([
                        'product_id' => $value['product_id'],
                        'quantity' => $value['quantity']
                    ]);
                } else {
                    Item::create([
                        'requisition_id' => $requisition->id,
                        'product_id' => $item['product_id'],
                        'quantity' => $item['quantity']
                    ]);
                }
            }
        }

        return response()->json([
            'data' => $requisition,
            'status' => 'success',
            'message' => 'Requisition updated Successfully!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function destroy($requisition)
    {
        $requisition = Requisition::find($requisition);

        if (! $requisition) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid token'
            ], 422);
        }

        $old = $requisition;
        $requisition->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Requisition Details'
        ], 200);
    }
}
