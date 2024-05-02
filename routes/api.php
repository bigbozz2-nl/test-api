<?php

use App\Http\Controllers\API\v1\QuoteApiController;
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

Route::middleware(['with-password'])->prefix('v1')->group(function () {
    Route::get('/get-quotes', [QuoteApiController::class, 'getQuotes'])->name('api.getQuotes');
});
