<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Product;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Upload;


/**
     * @OA\Post(
     * path="/documents",
     *   tags={"Documents"},
     *   summary="Save  document",
     *   operationId="documents",
     *
     * @OA\Parameter(
     *      name="user_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="integer",
     *      )
     * ),
     * @OA\Parameter(
     *      name="document_template_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="integer",
     *      )
     * ),
     * @OA\Parameter(
     *      name="title",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string",
     *      )
     * ),
     * @OA\Parameter(
     *      name="label",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string",
     *
     *      )
     * ),
     * @OA\Parameter(
     *      name="reference_no",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string",
     *
     *      )
     * ),
     * @OA\Parameter(
     *      name="description",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string",
     *
     *      )
     * ),
     * @OA\Parameter(
     *      name="documentable_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="integer",
     *
     *      )
     * ),
     * @OA\Parameter(
     *      name="status",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string",
     *          enum={"pending", "registered", "in-review", "completed"}
     *
     *      )
     * ),
     * @OA\Parameter(
     *      name="archived",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="boolean",
     *
     *      )
     * ),
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="Page Not Found. If error persists, contact info@ncdmb.gov.ng"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
        * @OA\Response(
     *         response=500,
     *         description="Error, please fix the following error(s)!;",
     *         @OA\JsonContent(
     *             type="string",
     *
     *         )
     *
     *     )
     *
     * )
     * )
    */
      /**
     * @OA\Get(
     *     path="/documents",
     *     tags={"Documents"},
     *      summary="Returns all documents on the system",
     *     description="Returns all documents on the system",
     *     operationId="findRoles",
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Document")
     *         )
     *
     *     ),
     * @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="Page Not Found. If error persists, contact info@ncdmb.gov.ng"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
       * @OA\Response(
     *         response=500,
     *         description="Error, please fix the following error(s)!;",
     *         @OA\JsonContent(
     *             type="string",
     *
     *         )
     *
     *     )
     * )
     *     )
     * )
     */

           /**
     * @OA\Get(
     *     path="/documents/{id}",
     *     tags={"Documents"},
     *     summary="Get document by id",
     *     description="Returns based on id ",
     *     operationId="showRole",
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="document id to get",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Document")
     *         )
     *
     *     ),
     * @OA\Response(
     *      response=404,
     *      description="Page Not Found. If error persists, contact info@ncdmb.gov.ng"
     *   ),
     *     * @OA\Response(
     *         response=500,
     *         description="Error, please fix the following error(s)!;",
     *         @OA\JsonContent(
     *             type="string",
     *
     *         )
     *
     *     ),
     *      @OA\Response(
     *          response=422,
     *          description="Invalid document id"
     *      )
     *
     * )
     *     )
     * )
     */

                /**
     * @OA\Get(
     *     path="/documents/{id}/edit",
     *     tags={"Documents"},
     *      summary="Open form to edit document",
     *     description="Returns based on id ",
     *     operationId="editRole",
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="document id to edit",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Document")
     *         )
     *
     *     ),
     *     * @OA\Response(
     *         response=500,
     *         description="Error, please fix the following error(s)!;",
     *         @OA\JsonContent(
     *             type="string",
     *
     *         )
     *
     *     ),
     * @OA\Response(
     *      response=404,
     *      description="Page Not Found. If error persists, contact info@ncdmb.gov.ng"
     *   ),
     *      @OA\Response(
     *          response=422,
     *          description="Invalid document id"
     *      )
     *
     * )
     *     )
     * )
     */


                /**
     * @OA\Put(
     *     path="/documents/{id}",
     *     tags={"Documents"},
     *      summary="update document by database",
     *     description="Updates document in database",
     *     operationId="updateRole",
     *
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="document id to update",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Document updated successfully!",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Document")
     *         )
     *
     *     ),
     * @OA\Response(
     *         response=500,
     *         description="Error, please fix the following error(s)!;",
     *         @OA\JsonContent(
     *             type="string",
     *
     *         )
     *
     *     ),
     * @OA\Response(
     *      response=404,
     *      description="Page Not Found. If error persists, contact info@ncdmb.gov.ng"
     *   ),
     *      @OA\Response(
     *          response=422,
     *          description="Invalid document id"
     *      )
     *
     * )
     *     )
     * )
     */

                     /**
     * @OA\Delete(
     *     path="/documents/{id}",
     *     tags={"Documents"},
     *      summary="remove document from database",
     *     description="Deletes document in database",
     *     operationId="updateRole",
     *
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="document id to delete",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Document deleted successfully!",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Document")
     *         )
     *
     *     ),
     * @OA\Response(
     *         response=500,
     *         description="Error, please fix the following error(s)!;",
     *         @OA\JsonContent(
     *             type="string",
     *
     *         )
     *
     *     ),
     * @OA\Response(
     *      response=404,
     *      description="Page Not Found. If error persists, contact info@ncdmb.gov.ng"
     *   ),
     *      @OA\Response(
     *          response=422,
     *          description="Invalid document id"
     *      )
     *
     * )
     *     )
     * )
     */

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
