<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Product;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Upload;

class DocumentController extends Controller
{

    protected $entity, $uploads;

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
        $documents = Document::latest()->get();

        if ($documents->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'warning',
                'message' => 'No data found!!!'
            ], 404);
        }

        return response()->json([
            'data' => $documents,
            'status' => 'success',
            'message' => 'Documents List'
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

    public function getEntities()
    {
        return ['projects', 'payments', 'tasks', 'ledgers', 'journals', 'products'];
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
            'entity' => 'required|string|max:255',
            'entity_id' => 'required|integer',
            'document_type_id' => 'required|integer',
            'document_template_id' => 'required|integer',
            'title' => 'required|string',
            'reference_no' => 'required|string|unique:documents',
            'description' => 'required|min:5'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $this->entity = $this->getValidEntity($request->entity, $request->entity_id);

        if ($this->entity === null) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid token entered'
            ], 422);
        }

        $document = new Document;
        $document->user_id = auth()->user()->id;
        $document->document_type_id = $request->document_type_id;
        $document->document_template_id = $request->document_template_id;
        $document->title = $request->title;
        $document->label = Str::slug($request->title);
        $document->reference_no = $request->reference_no;
        $document->description = $request->description;
        $this->entity->documents()->save($document);

        if ($request->has('uploads')) {
            $this->addUploadsToDocument($request->uploads, $document);
        }

        return response()->json([
            'data' => $document,
            'status' => 'success',
            'message' => 'Document has been created successfully!!'
        ], 201);
    }

    protected function addUploadsToDocument(array $files, Document $document)
    {
        foreach ($files as $file) {
            $upload = new Upload;
            $upload->user_id = auth()->user()->id;
            $upload->name = $file['name'];
            $upload->path = $file['path'];
            $upload->ext = $file['ext'];
            $upload->size = $file['size'];
            $upload->type = $file['type'];
            $document->uploads()->save($upload);

            $this->uploads[] = $upload;
        }

        return $this->uploads;
    }

    protected function getValidEntity($str, $id)
    {
        if (! in_array($str, $this->getEntities())) {
            return null;
        }

        switch ($str) {
            case 'projects':
                return Project::find($id);
                break;

            case 'ledgers':
                return Product::find($id);
                break;

            default:
                return null;
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show($document)
    {
        $document = Document::find($document);
        if (! $document) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $document,
            'status' => 'success',
            'message' => 'Document details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit($document)
    {
        $document = Document::find($document);
        if (! $document) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $document,
            'status' => 'success',
            'message' => 'Document details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $document)
    {
        $validator = Validator::make($request->all(), [
            'document_type_id' => 'required|integer',
            'document_template_id' => 'required|integer',
            'title' => 'required|string',
            'description' => 'required|min:5'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $document = Document::find($document);
        if (! $document) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $document->document_type_id = $request->document_type_id;
        $document->document_template_id = $request->document_template_id;
        $document->title = $request->title;
        $document->label = Str::slug($request->title);
        $document->description = $request->description;
        $document->save();

        if ($request->has('uploads')) {
            $this->addUploadsToDocument($request->uploads, $document);
        }

        return response()->json([
            'data' => $document,
            'status' => 'success',
            'message' => 'Document has been updated successfully!!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy($document)
    {
        $document = Document::find($document);
        if (! $document) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $old = $document;
        $document->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Document has been deleted successfully!!'
        ], 200);
    }
}
