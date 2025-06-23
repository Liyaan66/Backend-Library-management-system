<?php

use App\Http\Controllers\Api\V1\BookController;
use App\Http\Controllers\Api\V1\BookKeeperController;
use App\Http\Controllers\Api\V1\BorrowBookController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\ReaderController;
use App\Http\Controllers\Api\V1\TimetableController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function (){
    Route::apiResource('books', BookController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('readers', ReaderController::class);
    Route::apiResource('bookkeepers', BookKeeperController::class);
    Route::apiResource('borrow-books', BorrowBookController::class);
    Route::apiResource('timetables', TimetableController::class);
});
