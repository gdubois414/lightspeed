<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

/**
 * Class ProjectController
 * @package App\Http\Controllers
 */
class ProjectController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $projects = Project::get();
        return view('index', [
            'projects' => $projects
        ]);
    }

    /**
     * @param $project
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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
