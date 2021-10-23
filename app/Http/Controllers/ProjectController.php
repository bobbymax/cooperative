<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Upload;
use App\Models\Survey;
use App\Models\Variation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

/**
     * @OA\Post(
     * path="/projects",
     *   tags={"Projects"},
     *   summary="Save user project",
     *   operationId="projects",
     *
     *
     *   @OA\Parameter(
     *      name="sub_budget_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="service_category_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="integer"
     *      )
     * ),
     * @OA\Parameter(
     *      name="department_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="integer"
     *      )
     * ),
     *
     *  @OA\Parameter(
     *      name="title",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="label",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="reference_no",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="duration",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="measurein",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string",
     *             enum={"days","weeks","months","years"}
     *      )
     *   ),
     *
     * @OA\Parameter(
     *      name="description",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *
     * @OA\Parameter(
     *      name="location",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *
     * @OA\Parameter(
     *      name="coordinates",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *
     * @OA\Parameter(
     *      name="proposed_amount",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="number",
     *              format="double"
     *      )
     *   ),
     *
     *
     * @OA\Parameter(
     *      name="evaluated_amount",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="number",
     *              format="double"
     *      )
     *   ),
     *
     *
     * @OA\Parameter(
     *      name="approved_amount",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="number",
     *              format="double"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="awarded",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="boolean"
     *      )
     * ),
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
     *     path="/projects",
     *     tags={"Projects"},
     *      summary="Returns all projects on the system",
     *     description="Returns all projects on the system",
     *     operationId="findRoles",
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Project")
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
     *     path="/projects/{id}",
     *     tags={"Projects"},
     *     summary="Get project by id",
     *     description="Returns based on id ",
     *     operationId="showRole",
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="project id to get",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Project")
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
     *          description="Invalid project id"
     *      )
     *
     * )
     *     )
     * )
     */

                /**
     * @OA\Get(
     *     path="/projects/{id}/edit",
     *     tags={"Projects"},
     *      summary="Open form to edit project",
     *     description="Returns based on id ",
     *     operationId="editRole",
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="project id to edit",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Project")
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
     *          description="Invalid project id"
     *      )
     *
     * )
     *     )
     * )
     */


                /**
     * @OA\Put(
     *     path="/projects/{id}",
     *     tags={"Projects"},
     *      summary="update project by database",
     *     description="Updates project in database",
     *     operationId="updateRole",
     *
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="project id to update",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Project updated successfully!",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Project")
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
     *          description="Invalid project id"
     *      )
     *
     * )
     *     )
     * )
     */

                     /**
     * @OA\Delete(
     *     path="/projects/{id}",
     *     tags={"Projects"},
     *      summary="remove project from database",
     *     description="Deletes project in database",
     *     operationId="updateRole",
     *
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="project id to delete",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Project deleted successfully!",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Project")
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
     *          description="Invalid project id"
     *      )
     *
     * )
     *     )
     * )
     */
class ProjectController extends Controller
{

    protected $uploads = [];

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
        $projects = Project::latest()->get();

        if ($projects->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found!'
            ], 200);
        }

        return response()->json([
            'data' => $projects,
            'status' => 'success',
            'message' => 'Projects Lists'
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
            'sub_budget_head_id' => 'required|integer',
            'service_category_id' => 'required|integer',
            'department_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'reference_no' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required',
            'proposed_amount' => 'required|integer',
            'measureIn' => 'required|string|in:days,weeks,months,years'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $project = Project::create([
            'sub_budget_head_id' => $request->sub_budget_head_id,
            'service_category_id' => $request->service_category_id,
            'department_id' => $request->department_id,
            'title' => $request->title,
            'label' => Str::slug($request->title),
            'reference_no' => $request->reference_no,
            'location' => $request->location,
            'duration' => $request->duration,
            'measureIn' => $request->measuredIn,
            'coordinates' => $request->coordinates,
            'mobilization' => $request->mobilization,
            'description' => $request->description,
            'proposed_amount' => $request->proposed_amount,
            'evaluated_amount' => $request->evaluated_amount,
        ]);

        return response()->json([
            'data' => $project,
            'status' => 'success',
            'message' => 'Project Details have been created successfully!!'
        ], 201);
    }

    // public function addUploadsToProject(Request $request, $project)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'files' => 'required|array',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'data' => $validator->errors(),
    //             'status' => 'error',
    //             'message' => 'Please fix the following errors:'
    //         ], 500);
    //     }

    //     $project = Project::find($project);

    //     if (! $project) {
    //         return response()->json([
    //             'data' => null,
    //             'status' => 'error',
    //             'message' => 'Invalid ID entered'
    //         ], 422);
    //     }

    //     foreach ($request->files as $file) {
    //         $upload = new Upload;
    //         $upload->user_id = auth()->user()->id;
    //         $upload->name = $file['name'];
    //         $upload->path = $file['path'];
    //         $upload->ext = $file['ext'];
    //         $upload->size = $file['size'];
    //         $upload->type = $file['type'];
    //         $project->uploads()->save($upload);

    //         $this->uploads[] = $upload;
    //     }

    //     return response()->json([
    //         'data' => $this->uploads,
    //         'status' => 'success',
    //         'message' => 'Project Uploads saved successfully!!'
    //     ], 201);
    // }

    protected function addUploadsToProject(array $files, Project $project)
    {
        foreach ($files as $file) {
            $upload = new Upload;
            $upload->user_id = auth()->user()->id;
            $upload->name = $file['name'];
            $upload->path = $file['path'];
            $upload->ext = $file['ext'];
            $upload->size = $file['size'];
            $upload->type = $file['type'];
            $project->uploads()->save($upload);

            $this->uploads[] = $upload;
        }

        return $this->uploads;
    }


    /**
     * Store a newly created project survey question in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addSurveyQuestions(Request $request, $project)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|string|max:255',
            'category' => 'required|string|max:255|in:multiple-choice,objectives,text,range-choice',
            'type' => 'required|string|max:255|in:general,technical,survey,feedback'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $project = Project::find($project);

        if (! $project) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $survey = new Survey;
        $survey->question = $request->question;
        $survey->category = $request->category;
        $survey->type = $request->type;
        $survey->max_range_number = $request->max_range_number;
        $project->surveys()->save($survey);

        if ($survey && $request->options) {
            foreach($request->options as $option) {
                # code
                $variation = new Variation;
                $variation->possible_answer = $option['possible_answer'];
                $variation->correct = $option['correct'];

                $survey->variations()->save($variation);
            }
        }

        return response()->json([
            'data' => $survey,
            'status' => 'success',
            'message' => 'Sub-Budget Head details'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($project)
    {
        $project = Project::find($project);

        if (! $project) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        return response()->json([
            'data' => $project,
            'status' => 'success',
            'message' => 'Sub-Budget Head details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($project)
    {
        $project = Project::find($project);

        if (! $project) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        return response()->json([
            'data' => $project,
            'status' => 'success',
            'message' => 'Sub-Budget Head details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $project)
    {
        $validator = Validator::make($request->all(), [
            'sub_budget_head_id' => 'required|integer',
            'service_category_id' => 'required|integer',
            'department_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'reference_no' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required',
            'proposed_amount' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $project = Project::find($project);

        if (! $project) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $project->update([
            'sub_budget_head_id' => $request->sub_budget_head_id,
            'service_category_id' => $request->service_category_id,
            'department_id' => $request->department_id,
            'title' => $request->title,
            'label' => Str::slug($request->title),
            'reference_no' => $request->reference_no,
            'location' => $request->location,
            'duration' => $request->duration,
            'measuredIn' => $request->measuredIn,
            'coordinates' => $request->coordinates,
            'mobilization' => $request->mobilization,
            'description' => $request->description,
            'proposed_amount' => $request->proposed_amount,
            'evaluated_amount' => $request->evaluated_amount,
        ]);

        if ($request->files) {
            $this->addUploadsToProject($request->files, $project);
        }

        return response()->json([
            'data' => $project,
            'status' => 'success',
            'message' => 'Project Details have been updated successfully!!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($project)
    {
        $project = Project::find($project);

        if (! $project) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $old = $project;
        $project->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Project Details have been deleted successfully!!'
        ], 200);
    }
}
