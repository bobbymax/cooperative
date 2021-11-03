<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DocumentTypeController extends Controller
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
        $docTypes = DocumentType::latest()->get();

        if ($docTypes->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found!'
            ], 404);
        }

        return response()->json([
            'data' => $docTypes,
            'status' => 'success',
            'message' => 'Document Types List'
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
            'name' => 'required|string',
            'label' => 'required|string|max:255|unique:document_types',
            'reference_code' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $docType = DocumentType::create($request->all());

        return response()->json([
            'data' => $docType,
            'status' => 'success',
            'message' => 'Document Type has been created successfully!!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocumentType  $documentType
     * @return \Illuminate\Http\Response
     */
    public function show($documentType)
    {
        $docType = DocumentType::find($documentType);
        if (! $docType) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $docType,
            'status' => 'success',
            'message' => 'Document Type details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocumentType  $documentType
     * @return \Illuminate\Http\Response
     */
    public function edit($documentType)
    {
        $docType = DocumentType::find($documentType);
        if (! $docType) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $docType,
            'status' => 'success',
            'message' => 'Document Type details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DocumentType  $documentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $documentType)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'reference_code' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $docType = DocumentType::find($documentType);
        if (! $docType) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $docType->update([
            'name' => $request->name,
            'label' => Str::slug($request->name),
            'reference_code' => $request->reference_code
        ]);

        return response()->json([
            'data' => $docType,
            'status' => 'success',
            'message' => 'Document Type has been updated successfully!!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocumentType  $documentType
     * @return \Illuminate\Http\Response
     */
    public function destroy($documentType)
    {
        $docType = DocumentType::find($documentType);
        if (! $docType) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $old = $docType;
        $docType->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Document Type has been deleted successfully!!'
        ], 200);
    }
}
