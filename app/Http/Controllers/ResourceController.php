<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class ResourceController extends Controller
{
    public function getResources()
    {
        $resources = \App\Models\Resource::all();
       
        return response()->json($resources);
    }

    public function getCuratedResources($section)
    {
        $resources = \App\Models\Resource::where('section', $section)->get();
       
        return response()->json($resources);
    }
}
