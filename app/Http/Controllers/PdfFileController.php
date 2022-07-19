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
}
