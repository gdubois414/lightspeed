<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    public function show(Project $project)
    {
        return response(Project::where('id', $project->id)->with('users')->get()->toJSON(), Response::HTTP_OK);
    }
}
