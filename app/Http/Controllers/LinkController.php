<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        return response()->json($this->resourceService->getAllLinks());
    }

    public function show($id)
    {
        return response()->json($this->resourceService->getSingleLink($id));
    }
}
