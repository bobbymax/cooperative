<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Upload;


/**
     * @OA\Post(
     * path="/products",
     *   tags={"Products"},
     *   summary="Save  product",
     *   operationId="products",
     *
     *
     *   @OA\Parameter(
     *      name="category_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="department_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="integer"
     *      )
     * ),
     * @OA\Parameter(
     *      name="company_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="number",
     *          format="integer"
     *      )
     * ),
     * @OA\Parameter(
     *      name="brand_id",
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
     *
     *      )
     * ),
     *  @OA\Parameter(
     *      name="label",
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
     *           type="string"
     *
     *      )
     *   ),
     *
     * @OA\Parameter(
     *      name="quantity",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *@OA\Parameter(
     *      name="value",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="number",
     *          format="double"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="expiration",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     * @OA\Parameter(
     *      name="measure",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string",
     *          enum={"days", "weeks", "months", "years"}
     *      )
     *   ),
     * @OA\Parameter(
     *      name="status",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string",
     *          enum={"pending", "registered", "verification", "out-of-stock"}
     *      )
     *   ),
     * @OA\Parameter(
     *      name="inStock",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="boolean",
     *
     *      )
     *   ),
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
     *     path="/products",
     *     tags={"Products"},
     *      summary="Returns all products on the system",
     *     description="Returns all products on the system",
     *     operationId="findRoles",
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Product")
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
     *     path="/products/{id}",
     *     tags={"Products"},
     *     summary="Get product by id",
     *     description="Returns based on id ",
     *     operationId="showRole",
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="product id to get",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Product")
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
     *          description="Invalid product id"
     *      )
     *
     * )
     *     )
     * )
     */

                /**
     * @OA\Get(
     *     path="/products/{id}/edit",
     *     tags={"Products"},
     *      summary="Open form to edit product",
     *     description="Returns based on id ",
     *     operationId="editRole",
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="product id to edit",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Product")
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
     *          description="Invalid product id"
     *      )
     *
     * )
     *     )
     * )
     */


                /**
     * @OA\Put(
     *     path="/products/{id}",
     *     tags={"Products"},
     *      summary="update product by database",
     *     description="Updates product in database",
     *     operationId="updateRole",
     *
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="product id to update",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Product updated successfully!",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Product")
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
     *          description="Invalid product id"
     *      )
     *
     * )
     *     )
     * )
     */

                     /**
     * @OA\Delete(
     *     path="/products/{id}",
     *     tags={"Products"},
     *      summary="remove product from database",
     *     description="Deletes product in database",
     *     operationId="updateRole",
     *
     *   @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="product id to delete",
     *         required=true,
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Product deleted successfully!",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Product")
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
     *          description="Invalid product id"
     *      )
     *
     * )
     *     )
     * )
     */
class ProductController extends Controller
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
        $products = Product::latest()->get();

        if ($products->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found!'
            ], 404);
        }

        return response()->json([
            'data' => $products,
            'status' => 'success',
            'message' => 'Products List'
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
            'category_id' => 'required|integer',
            'department_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:9|unique:products',
            'description' => 'required|min:5',
            'quantity' => 'required|integer',
            'expiration' => 'required|integer',
            'measure' => 'required|string|in:days,weeks,months,years',
            'uploads' => 'required|array'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $product = Product::create([
            'category_id' => $request->category_id,
            'department_id' => $request->department_id,
            'company_id' => isset($request->company_id) ? $request->company_id : 0,
            'brand_id' => isset($request->brand_id) ? $request->brand_id : 0,
            'title' => $request->title,
            'label' => Str::slug($request->title),
            'code' => $request->code,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'value' => isset($request->value) ? $request->value : 0,
            'expiration' => $request->expiration,
            'measure' => $request->measure,
            'inStock' => $request->quantity > 0 ? true : false
        ]);

        if ($product) {
            $this->addUploadsToProduct($request->uploads, $product);
        }

        return response()->json([
            'data' => $product,
            'status' => 'success',
            'message' => 'Product has been created successfully!!'
        ], 201);
    }

    protected function addUploadsToProduct(array $files, Product $product)
    {
        foreach ($files as $file) {
            $upload = new Upload;
            $upload->user_id = auth()->user()->id;
            $upload->name = $file['name'];
            $upload->path = $file['path'];
            $upload->ext = $file['ext'];
            $upload->size = $file['size'];
            $upload->type = $file['type'];
            $product->uploads()->save($upload);

            $this->uploads[] = $upload;
        }

        return $this->uploads;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {
        $product = Product::find($product);
        if (! $product) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $product,
            'status' => 'success',
            'message' => 'Product details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        $product = Product::find($product);
        if (! $product) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }
        return response()->json([
            'data' => $product,
            'status' => 'success',
            'message' => 'Product details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|integer',
            'department_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'required|min:5',
            'quantity' => 'required|integer',
            'expiration' => 'required|integer',
            'measure' => 'required|string|in:days,weeks,months,years'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following errors:'
            ], 500);
        }

        $product = Product::find($product);
        if (! $product) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $product->update([
            'category_id' => $request->category_id,
            'department_id' => $request->department_id,
            'company_id' => isset($request->company_id) ? $request->company_id : 0,
            'brand_id' => isset($request->brand_id) ? $request->brand_id : 0,
            'title' => $request->title,
            'label' => Str::slug($request->title),
            'description' => $request->description,
            'quantity' => $request->quantity,
            'value' => isset($request->value) ? $request->value : 0,
            'expiration' => $request->expiration,
            'measure' => $request->measure,
            'inStock' => $request->quantity > 0 ? true : false
        ]);

        if ($product && $request->has('uploads')) {
            $this->addUploadsToProduct($request->uploads, $product);
        }

        return response()->json([
            'data' => $product,
            'status' => 'success',
            'message' => 'Product has been updated successfully!!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        $product = Product::find($product);
        if (! $product) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid ID entered'
            ], 422);
        }

        $old = $product;
        $product->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Product has been deleted successfully!!'
        ], 200);
    }
}
