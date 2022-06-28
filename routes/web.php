<?php

use App\Http\Controllers\User\CodeController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PlanController;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
Auth::routes();

Route::middleware(['has.plan'])->get('/', function () {

    return redirect('code');


});


Route::name('user.')->group(function (){
    Route::get('code',[CodeController::class,'code'])->name('code');

});

Route::name('user.')->middleware(['auth'])->group(function (){
    Route::get('plans',[PlanController::class, 'index'])->name('plans');
    Route::post('order/{plan_id}',[OrderController::class, 'buy'])->name('order.buy');
    Route::get('order/callback',[OrderController::class, 'verify'])->name('callback');
});



