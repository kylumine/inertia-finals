<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
{
    // Get the current logged in user's ID
    $user_id = auth()->user()->id ?? null;

    // Get only the projects created by the current user
    $project = Project::where('user_id', $user_id)
                        ->orderBy('id')
                        ->get();

    return inertia('Project', ['project' => $project]);
}

    public function create()
    {
        return inertia("Create");
    }

    public function store(Request $request)
    {
    $request->validate([
        'imageUrl' => 'required',
        'name' => 'required',
        'description' => 'required'

    ]);

    $user_id = auth()->user()->id ?? null;
    $request->merge(['user_id' => $user_id]);

    Project::create($request->all());
    return redirect('/project');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/project')->with('success', 'Project deleted successfully.');
    }

    public function edit(Project $project)
    {
        return inertia('Edit', ['project' => $project]);
    }

    public function update(Request $request, Project $project)
    {
        $fields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'imageUrl' => 'required',

        ]);

        $project->update($fields);

        return redirect('/project')->with('success', 'Project updated');
    }
}
