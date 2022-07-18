<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HtmlSnippetController extends Controller
{
    public function index()
    {
        return response()->json($this->resourceService->getAllHtmlSnippets());
    }
}
