<?php

namespace App\Http\Controllers;

use App\Models\PdfFile;
use Illuminate\Http\Request;

class PdfFileController extends Controller
{
    public function index()
    {
        return response()->json($this->resourceService->getAllPdfFiles());
    }

    public function show(PdfFile $pdfFile)
    {
        return response()->json($pdfFile);
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'title' => 'required|max:255',
            'file' => 'required|mimes:pdf|max:10000',
        ]);
        $this->resourceService->storePdfFile($valid);
        return response()->json(['message' => 'Created Successfully']);
    }

    public function update(PdfFile $pdfFile, Request $request)
    {
        $valid = $request->validate([
            'title' => 'required|max:255',
            'file' => 'nullable|mimes:pdf|max:10000',
        ]);
        $this->resourceService->updatePdfFile($pdfFile, $valid);
        return response()->json(['message' => 'Updated Successfully']);
    }

    public function delete(PdfFile $pdfFile)
    {
        $this->resourceService->deleteFile($pdfFile);
        $pdfFile->delete();
        return response()->json(['message' => 'Deleted Successfully']);
    }
}
