<?php

use App\Http\Controllers\HtmlSnippetController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PdfFileController;
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
Route::apiResource('/pdf-files', PdfFileController::class);
Route::apiResource('/html-snippets', HtmlSnippetController::class);
Route::apiResource('/links', LinkController::class);
