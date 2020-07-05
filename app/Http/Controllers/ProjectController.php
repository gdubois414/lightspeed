<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::get();
        return view('index', [
            'projects' => $projects
        ]);
    }

    public function show($project)
    {
        $project = Project::where('slug', $project)->first();

        if(!$project){
            abort(404);
        }

        return view('project', [
            'project' => $project
        ]);
    }
}
