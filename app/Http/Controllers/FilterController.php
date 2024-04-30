<?php

namespace App\Http\Controllers;

use App\Services\FilterResourceService;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    protected $resourceService;
    protected $slideService;
    protected $examService;

    public function __construct(FilterResourceService $resourceService)
    {
        $this->resourceService = $resourceService;
    }


    public function fetchFilteredResources(Request $request)
    {
        $id = $request->query('id');

        $html = $this->resourceService->loadInitialResource($id);

        return response()->json(['html' => $html]);
    }

    public function filterResources(Request $request)
    {
        $html = $this->resourceService->loadFilteredResource($request);

        return response()->json(['html' => $html]);
    }
}
