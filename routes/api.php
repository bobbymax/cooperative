<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Login User In
Route::post('login', 'LoginController@login');

// ApiResource Routes
Route::apiResource('roles', 'RoleController');
Route::apiResource('permissions', 'PermissionController');
Route::apiResource('groups', 'GroupController');
Route::apiResource('departments', 'DepartmentController');
Route::apiResource('modules', 'ModuleController');
Route::apiResource('workFlows', 'WorkFlowController');
Route::apiResource('settings', 'SettingController');
Route::apiResource('users', 'UserController');
Route::apiResource('gradeLevels', 'GradeLevelController');

// Procurement Module Routes
Route::apiResource('serviceCategories', 'ServiceCategoryController');
Route::apiResource('tags', 'TagController');
Route::apiResource('projects', 'ProjectCotroller');
Route::apiResource('uploads', 'UploadController');
Route::apiResource('companies', 'CompanyController');
Route::apiResource('bids', 'BidController');

// Timeline Routes
Route::apiResource('timelines', 'TimelineController');
Route::apiResource('tasks', 'TaskController');

// Finance and Accounting Routes
Route::apiResource('accountCharts', 'AccountChartController');
Route::apiResource('accountCodes', 'AccountCodeController');
Route::apiResource('accounts', 'AccountController');
Route::apiResource('batches', 'BatchController');
Route::apiResource('journals', 'JournalController');
Route::apiResource('ledgers', 'LedgerController');

// Budget Control Routes
Route::apiResource('budgetHeads', 'BudgetHeadController');
Route::apiResource('subBudgetHeads', 'SubBudgetHeadController');
Route::apiResource('funds', 'FundController');
Route::apiResource('expenditures', 'ExpenditureController');

// Inventory/Store Routes
Route::apiResource('categories', 'CategoryController');
Route::apiResource('products', 'ProductController');
Route::apiResource('brands', 'BrandController');
Route::apiResource('requisitions', 'RequisitionController');
Route::apiResource('allocations', 'AllocationController');


Route::fallback(function () {
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@ncdmb.gov.ng'
    ], 404);
});
