<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        return response()->json($this->resourceService->getAllLinks());
    }

    public function show(Link $link)
    {
        return response()->json($link);
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'title' => 'required|max:255',
            'link' => 'required|url|max:255',
            'open_in_new_tab' => 'required|boolean',
        ]);
        $this->resourceService->storeModel($valid, 'App\Models\Link');
        return response()->json(['message' => 'Created Successfully']);
    }

    public function update(Link $link, Request $request)
    {
        $valid = $request->validate([
            'title' => 'required|max:255',
            'link' => 'required|max:255',
            'open_in_new_tab' => 'required|boolean',
        ]);
        $this->resourceService->updateModel($link, $valid);
        return response()->json(['message' => 'Updated Successfully']);
    }

    public function destroy(Link $link)
    {
        $link->delete();
        return response()->json(['message' => 'Deleted Successfully']);
    }
}
