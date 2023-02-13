<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ParentCategoryController;
use App\Http\Controllers\ChildCategoryController;

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
Route::resource('payment', PaymentController::class)->except(['create', 'edit', 'update', 'show']);
Route::resource('paymentCategoryParent', ParentCategoryController::class)->except(['create', 'edit']);
Route::resource('paymentCategoryChild', ChildCategoryController::class)->except(['create', 'edit']);
