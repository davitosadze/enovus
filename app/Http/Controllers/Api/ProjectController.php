<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id', "desc")->get();
        return response()->json(["success" => true, "data" => $projects], 200);
    }

    public function project($id)
    {
        $project = Project::where('id', $id)
            ->with('media')
            ->first();
        return response()->json(["success" => true, "data" => $project], 200);
    }
}
