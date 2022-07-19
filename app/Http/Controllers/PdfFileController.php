<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfFileController extends Controller
{
    public function index()
    {
        return response()->json($this->resourceService->getAllPdfFiles());
    }

    public function show($id)
    {
        return response()->json($this->resourceService->getSinglePdfFile($id));
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

    public function update($id, Request $request)
    {
        $valid = $request->validate([
            'title' => 'required|max:255',
            'file' => 'nullable|mimes:pdf|max:10000',
        ]);
        $pdfFile = $this->resourceService->getSinglePdfFile($id);
        $this->resourceService->updatePdfFile($pdfFile, $valid);
        return response()->json(['message' => 'Updated Successfully']);
    }

    public function delete($id)
    {
        $pdfFile = $this->resourceService->getSinglePdfFile($id);
        $this->resourceService->deleteFile($pdfFile);
        $pdfFile->delete();
        return response()->json(['message' => 'Deleted Successfully']);
    }
}
