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

Route::get('/pdf-files', [PdfFileController::class, 'index']);
Route::get('/html-snippets', [HtmlSnippetController::class, 'index']);
Route::get('/links', [LinkController::class, 'index']);
