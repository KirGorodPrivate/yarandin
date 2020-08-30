<?php

namespace App\Http\Controllers;

use App\Project as AppProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = AppProject::all();
        return view('dashboard')->with('projects', $projects);
    }

    public function create(){
        return view('project.create');
    }
        

    public function save(Request $req)
    {
        $project = new AppProject;
        $project->title = $req->title;
        $project->description = $req->description;
        $project->user_id = Auth::user()->id;
        $project->save();

        return redirect('dashboard');
    }

    public function show($project_id)
    {
        $project = new AppProject;
        return view('project.show', ['project' => $project->find($project_id), 'tasks' => $project->find($project_id)->task]);
    }

    public function New($project_id)
    {
        $project = new AppProject;
        return view('project.new', ['project' => $project->find($project_id), 'tasks' => $project->find($project_id)->task->where('status', 'New')]);
    }

    public function showProgress($project_id)
    {
        $project = new AppProject;
        return view('project.inprogress', ['project' => $project->find($project_id), 'tasks' => $project->find($project_id)->task->where('status', 'In progress')]);
    }

    public function showDone($project_id)
    {
        $project = new AppProject;
        return view('project.done', ['project' => $project->find($project_id), 'tasks' => $project->find($project_id)->task->where('status', 'Done')]);
    }

    public function delete($project_id)
    {
        AppProject::find($project_id)->delete();
        //return redirect()->route('contact-data')->with('success', 'Project was Deleted');
        return redirect('dashboard');
    }

    public function update($project_id)
    {
        $project = new AppProject;
        return view('project.update', ['project' => $project->find($project_id)]);
    }

    public function updateSave ($project_id, Request $req) {

        $project = AppProject::find($project_id);
        $project->title = $req->input('title');
        $project->description = $req->input('description');
        

        $project->save();

        return redirect('project');
    }
}
