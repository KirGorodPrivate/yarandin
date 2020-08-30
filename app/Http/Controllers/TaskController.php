<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TaskController extends Controller
{
    public function show($project_id, $task_id)
    {
        $task = Task::find($task_id);
        $data = ['project_id' => $project_id, 'task_id' => $task_id, 'task' => $task];
        return view('task.show', $data);
    }

    public function create($project_id)
    {
        $data = $project_id;

        return view('task.create', ['project_id' => $data]);
    }

    public function save($project_id, Request $req)
    {
        $task = new Task;

        $task->title = $req->title;
        $task->description = $req->description;
        $task->status = $req->status;
        $task->project_id = $project_id;

        if($req->hasFile('file')) {
            $file = $req->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/task/', $filename);
            $task->file = $filename;
        } else {
            $task->file = '';
        }
        $task->save();

        return redirect()->route('project.show', $project_id);
    }

    public function update($project_id, $task_id)
    {
        $task = new Task;
        return view('task.update', ['project_id' => $project_id, 'task_id' => $task_id, 'task' => $task->find($task_id)]);
    }

    public function updateSave($project_id, $task_id, Request $req) {
        $task = Task::find($task_id);
        $task->title = $req->input('title');
        $task->description = $req->input('description');
        $task->status = $req->input('status');

        if($req->hasFile('file')) {
            $file = $req->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/task/', $filename);
            $task->file = $filename;
        } else {
            $task->file = '';
        }

        $task->save();

        return redirect()->route('project.show', $project_id);
    }

    public function delete($project_id, $task_id)
    {
        Task::find($task_id)->delete();
        //return redirect()->route('contact-data')->with('success', 'Project was Deleted');
        return redirect("/project/$project_id");
    }

    public function download($name)
    {
        $file = public_path()."/uploads/task/$name";

        return Response::download($file);
    }
}
