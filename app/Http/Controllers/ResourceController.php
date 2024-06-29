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
        if ($section == 123){
            $resources = \App\Models\Resource::where('level', 3)->get();
        } else {
            
        $resources = \App\Models\Resource::where('section', $section)->get();
        }
        return response()->json($resources);
    }
}
