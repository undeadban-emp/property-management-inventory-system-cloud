<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes`
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/api-data/item', [ApiController::class, 'getDataItem']);



Route::post('/api-data/inventory-custodian', [ApiController::class, 'getDataInventoryCustodian']);



Route::post('/api-data/property-acknowledgement', [ApiController::class, 'getDataPropertyAcknowledgement']);



Route::post('/api-data/office', [ApiController::class, 'getDataOffice']);
