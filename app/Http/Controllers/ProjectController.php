<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    function index(){
        
        $projects = Project::where('user_id', auth()->user()->id)
            ->orderByRaw('FIELD(status, 4, 2, 1, 5, 3)')
            ->get();

        return view('projects.index', compact('projects'));

    }

    function show(Project $project){


        
        return view('projects.show');        

    }
}
