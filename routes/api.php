<?php

use App\Http\Controllers\User\api\CodeController;
use App\Http\Controllers\User\api\ShortLinkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
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

Route::prefix('code')->group(function (){
    Route::get('generate', [CodeController::class,'generate']);
    Route::post('check', [CodeController::class,'check']);
    Route::post('check/city', [CodeController::class,'check_city']);
});

Route::prefix('url')->group(function (){
    Route::post('shortener', [ShortLinkController::class,'UrlShortener']);
});
