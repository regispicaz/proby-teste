<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Project;
use Illuminate\Http\Request;

class StatusProjectController extends Controller
{
    public function pending()
    {
        $projects = Project::where('status', Status::Pendente)->paginate(10);
        return view('projects.status.pending', ['projects' => $projects]);
    }

    public function inProgress()
    {
        $projects = Project::where('status', 'Em Andamento')->paginate(5);
        return view('projects.status.in_progress', ['projects' => $projects]);
    }

    public function completed()
    {
        $projects = Project::where('status', 'Concluído')->paginate(5);
        return view('projects.status.completed', ['projects' => $projects]);
    }
}
