<?php

use App\Http\Controllers\User\CodeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('code');
});


Route::name('user.')->group(function (){
    Route::get('code',[CodeController::class,'code'])->name('code');
});
