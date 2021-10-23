<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function show($upload)
    {
        $upload = Upload::find($upload);

        if (! $upload) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        return response()->json([
            'data' => $upload,
            'status' => 'success',
            'message' => 'Uploaded file details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function edit($upload)
    {
        $upload = Upload::find($upload);

        if (! $upload) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        return response()->json([
            'data' => $upload,
            'status' => 'success',
            'message' => 'Uploaded file details'
        ], 200);
    }

    public function update(Request $request, $upload)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:image,file,video',
            'ext' => 'required|string',
            'size' => 'required|integer',
            'path' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $upload = Upload::find($upload);

        if (! $upload) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $upload->update([
            'name' => $request->name,
            'path' => $request->path,
            'ext' => $request->ext,
            'size' => $request->size,
            'type' => $request->type
        ]);

        return response()->json([
            'data' => $upload,
            'status' => 'success',
            'message' => 'Upload file updated successfully!!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function destroy($upload)
    {
        $upload = Upload::find($upload);

        if (! $upload) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $old = $upload;
        $upload->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Upload file deleted successfully!!'
        ], 200);
    }
}
