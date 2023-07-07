<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Quote;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        
        $projects = Project::where('user_id', auth()->user()->id)
            ->orderByRaw('FIELD(status, 4, 2, 1, 5, 3)')
            ->paginate(12, ['*'], 'projects');

        return view('projects.index', compact('projects'));
        // return $projects;

    }

    public function show(Project $project){

        $typesStatus = [
            '1' => 'PENDING',
            '2' => 'APPROVED',
            '4' => 'INITIALIZED',
            '5' => 'DONE',
            '3' => 'REJECTED',
        ];

        $quotes = Quote::where('project_id', $project->id)
            ->get();
        
        return view('projects.show', compact('project', 'typesStatus', 'quotes'));

    }
}
