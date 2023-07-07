<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {

        $projects = Project::where('user_id', auth()->user()->id)
            ->whereIn('status', [Project::INITIALIZED, Project::APPROVED])
            ->orderBy('status', 'desc')
            ->limit(6)
            ->get();
        
        $companies = Company::where('user_id', auth()->user()->id)
            ->orderBy('name', 'asc')
            ->get();

        return view('dashboard', compact('projects', 'companies'));
    }
}
