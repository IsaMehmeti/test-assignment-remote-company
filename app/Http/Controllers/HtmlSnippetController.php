<?php

namespace App\Http\Controllers;

use App\Models\PdfFile;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class HtmlSnippetController extends Controller
{
    public function index()
    {
        return response()->json($this->resourceService->getAllHtmlSnippets());
    }

    public function show(PdfFile $pdfFile)
    {
        return response()->json($pdfFile);
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

    public function update(PdfFile $pdfFile, Request $request)
    {
        $valid = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'snippet' => 'required',
        ]);
        $this->resourceService->updateModel($pdfFile, $valid);
        return response()->json(['message' => 'Updated Successfully']);
    }

    public function destroy(PdfFile $pdfFile)
    {
        $pdfFile->delete();
        return response()->json(['message' => 'Deleted Successfully']);
    }
}
