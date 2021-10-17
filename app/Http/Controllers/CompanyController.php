<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CompanyController extends Controller
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
        $companies = Company::latest()->get();

        if ($companies->count() < 1) {
            return response()->json([
                'data' => [],
                'status' => 'info',
                'message' => 'No data found'
            ], 404);
        }

        return response()->json([
            'data' => $companies,
            'status' => 'success',
            'message' => 'Company List'
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
            'service_category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:companies',
            'contact_email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|string|unique:companies',
            'contact_mobile' => 'required|string|unique:users',
            'firstname' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'profile' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following error(s):'
            ], 500);
        }

        $company = Company::create([
            'service_category_id' => $request->service_category_id,
            'name' => $request->name,
            'label' => Str::slug($request->name),
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'profile' => $request->profile
        ]);

        if ($company) {
            $contactStaff = User::create([
                'company_id' => $company->id,
                'firstname' => $request->firstname,
                'surname' => $request->surname,
                'staff_no' => time() . Str::random(5),
                'email' => $request->contact_email,
                'type' => 'vendor',
                'mobile' => $request->contact_mobile
            ]);
        }

        return response()->json([
            'data' => $company,
            'status' => 'success',
            'message' => 'Vendor Created Successfully!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($company)
    {
        $company = Company::find($company);

        if (! $company) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid token'
            ], 422);
        }

        return response()->json([
            'data' => $company,
            'status' => 'success',
            'message' => 'Company Details'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $company = Company::find($company);

        if (! $company) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid token'
            ], 422);
        }

        return response()->json([
            'data' => $company,
            'status' => 'success',
            'message' => 'Company Details'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $company)
    {
        $validator = Validator::make($request->all(), [
            'service_category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'mobile' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => 'error',
                'message' => 'Please fix the following error(s):'
            ], 500);
        }

        $company = Company::find($company);

        if (! $company) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid token'
            ], 422);
        }

        $company->update([
            'service_category_id' => $request->service_category_id,
            'name' => $request->name,
            'label' => Str::slug($request->name),
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'profile' => $request->profile
        ]);

        return response()->json([
            'data' => $company,
            'status' => 'success',
            'message' => 'Vendor updated Successfully!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($company)
    {
        $company = Company::find($company);

        if (! $company) {
            return response()->json([
                'data' => null,
                'status' => 'error',
                'message' => 'Invalid token'
            ], 422);
        }

        $old = $company;
        $company->delete();

        return response()->json([
            'data' => $old,
            'status' => 'success',
            'message' => 'Vendor record deleted Successfully!'
        ], 200);
    }
}
