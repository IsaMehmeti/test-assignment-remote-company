<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class HtmlSnippetController extends Controller
{
    public function index()
    {
        return response()->json($this->resourceService->getAllHtmlSnippets());
    }

    public function show($id)
    {
        return response()->json($this->resourceService->getSingleHtmlSnippet($id));
    }
}
