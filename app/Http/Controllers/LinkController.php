<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        return response()->json($this->resourceService->getAllLinks());
    }
}
