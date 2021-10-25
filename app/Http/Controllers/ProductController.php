<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Upload;

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
