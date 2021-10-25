<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
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
        $tickets = Ticket::latest()->get();

        if ($tickets->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found!'
            ], 404);
        }

        return response()->json([
            'data' => $tickets,
            'status' => 'success',
            'message' => 'Tickets list'
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
            'title' => 'required|string|max:255',
            'concern_id' => 'required|integer',
            'reference_no' => 'required|string|max:10|unique:tickets',
            'specification' => 'required',
            'description' => 'required|min:3'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following error(s)!:'
            ], 500);
        }

        $ticket = Ticket::create([
            'title' => $request->title,
            'user_id' => auth()->user()->id,
            'concern_id' => $request->concern_id,
            'reference_no' => $request->reference_no,
            'specification' => $request->specification,
            'description' => $request->description
        ]);

        return response()->json([
            'data' => $ticket,
            'status' => 'success',
            'message' => 'Ticket has been created successfully!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($ticket)
    {
        $ticket = Ticket::find($ticket);

        if (! $ticket) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ticket id'
            ], 422);
        }

        return response()->json([
            'data' => $ticket,
            'status' => 'success',
            'message' => 'Ticket Details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit($ticket)
    {
        $ticket = Ticket::find($ticket);

        if (! $ticket) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ticket id'
            ], 422);
        }

        return response()->json([
            'data' => $ticket,
            'status' => 'success',
            'message' => 'Ticket Details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ticket)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'concern_id' => 'required|integer',
            'specification' => 'required',
            'description' => 'required|min:3'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following error(s)!:'
            ], 500);
        }

        $ticket = Ticket::find($ticket);

        if (! $ticket) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ticket id'
            ], 422);
        }

        $ticket->update([
            'title' => $request->title,
            'concern_id' => $request->concern_id,
            'specification' => $request->specification,
            'description' => $request->description
        ]);

        return response()->json([
            'data' => $ticket,
            'status' => 'success',
            'message' => 'Ticket has been updated successfully!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy($ticket)
    {
        $ticket = Ticket::find($ticket);

        if (! $ticket) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ticket id'
            ], 422);
        }

        $old = $ticket;
        $ticket->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Ticket has been deleted successfully!'
        ], 200);
    }
}
