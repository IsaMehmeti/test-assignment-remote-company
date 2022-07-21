<?php

namespace App\Http\Controllers;

use App\Models\HtmlSnippet;
use App\Models\PdfFile;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class HtmlSnippetController extends Controller
{
    public function index()
    {
        return response()->json($this->resourceService->getAllHtmlSnippets());
    }

    public function show(HtmlSnippet $htmlSnippet)
    {
        return response()->json($htmlSnippet);
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'snippet' => 'required',
        ]);
        $this->resourceService->storeModel($valid, 'App\Models\HtmlSnippet');
        return response()->json(['message' => 'Created Successfully']);
    }

    public function update(HtmlSnippet $htmlSnippet, Request $request)
    {
        $valid = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'snippet' => 'required',
        ]);
        $this->resourceService->updateModel($htmlSnippet, $valid);
        return response()->json(['message' => 'Updated Successfully']);
    }

    public function destroy(HtmlSnippet $htmlSnippet)
    {

        $htmlSnippet->delete();
        return response()->json(['message' => 'Deleted Successfully']);
    }
}
