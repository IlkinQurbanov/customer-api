<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//api/v1

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function(){
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('invoices', InvoiceController::class);
    
    Route::post('invoices/bulk', ['uses' => 'InvoiceController@bulkStore']);

} );